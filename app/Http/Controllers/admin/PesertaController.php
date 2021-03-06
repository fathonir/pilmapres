<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Kegiatan;
use App\Mahasiswa;
use App\Mail\PesertaApproveMail;
use App\Mail\PesertaRejectMail;
use App\Peserta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PesertaController extends Controller
{
    /**
     * @var Kegiatan 
     */
    protected $kegiatanAktif;
    
    public function __construct()
    {
        $this->kegiatanAktif = Kegiatan::where('is_aktif', 1)->first();
    }

    private function pesertaQueryBuilder()
    {
        return DB::table('pesertas as p')
            ->select(['p.id', 'm.nim', 'm.nama', 'm.tgl_lahir', 'p.semester_tempuh', 'p.ipk',
                'ps.nama_prodi', 'pt.nama_pt', 'fpp.nama_file', 'p.created_at', 'p.rejected_at', 'u.username',
                'p.keterangan_reject'])
            ->join('mahasiswas as m', 'm.id', '=', 'p.mahasiswa_id')
            ->join('program_studis as ps', 'ps.id', '=', 'm.program_studi_id')
            ->join('perguruan_tinggis as pt', 'pt.id', '=', 'ps.perguruan_tinggi_id')
            ->join('file_pengantar_pesertas as fpp', 'fpp.peserta_id', '=', 'p.id')
            ->leftJoin('users as u', 'u.mahasiswa_id', '=', 'm.id')
            ->where('p.kegiatan_id', $this->kegiatanAktif->id);
    }
    
    public function register()
    {
        $pesertas = $this->pesertaQueryBuilder()
            ->whereNull('is_approved')
            ->whereNull('is_rejected')
            ->orderBy('p.created_at')
            ->get();
        
        // Preprocessing
        foreach ($pesertas as $peserta) {
            // Perhitungan Umur
            $peserta->umur = date_diff(
                date_create($peserta->tgl_lahir),
                date_create($this->kegiatanAktif->tgl_batas_umur))
                ->format('%y Thn');
            // Lokasi File
            $peserta->nama_file = url(env('SURAT_PENGANTAR_PATH') . '/' . $peserta->nama_file);
        }
        
        return view('admin.peserta.register', ['pesertas' => $pesertas]);
    }
    
    public function approval(Request $request)
    {
        $peserta_id = $request->get('id');

        /** @var Peserta $peserta */
        $peserta = Peserta::find($peserta_id);

        $allValid = true;

        // Cek Perguruan Tinggi
        if ((int)substr($peserta->mahasiswa->perguruanTinggi->kode_pt, 0 ,2) <= 14) {
            $peserta->ptValid = true;
        } else {
            $peserta->ptValid = false;
            $allValid = false;
        }

        // Cek Jenjang
        $jenjang = substr($peserta->mahasiswa->programStudi->nama_prodi, 0, 2);
        if ($jenjang == 'D3' || $jenjang == 'S1') {
            $peserta->jenjangValid = true;
        } else {
            $peserta->jenjangValid = false;
            $allValid = false;
        }

        // Cek IPK
        if ($peserta->ipk >= $peserta->kegiatan->batas_ipk) {
            $peserta->ipkValid = true;
        } else {
            $peserta->ipkValid = false;
            $allValid = false;
        }

        // Cek semester
        if ($peserta->semester_tempuh <= $peserta->kegiatan->batas_semester) {
            $peserta->semesterValid = true;
        } else {
            $peserta->semesterValid = false;
            $allValid = false;
        }

        // Cek Umur
        $tgl_lahir = date_create($peserta->mahasiswa->tgl_lahir);
        $tgl_batas_umur = date_create($peserta->kegiatan->tgl_batas_umur);
        $diff_tgl = date_diff($tgl_lahir, $tgl_batas_umur);
        $peserta->umur = $diff_tgl->format('%y tahun %m bulan %d hari');
        if ($diff_tgl->y < $peserta->kegiatan->batas_umur) {
            $peserta->umurValid = true;
        } else {
            $peserta->umurValid = false;
            $allValid = false;
        }

        // PDF Surat Pengantar
        $peserta->filePengantarPeserta->nama_file = url(
            env('SURAT_PENGANTAR_PATH') . '/' . $peserta->filePengantarPeserta->nama_file
        );

        return view('admin.peserta.approval', ['peserta' => $peserta, 'allValid' => $allValid]);
    }

    public function approvalPost(Request $request)
    {
        $peserta_id = $request->get('id');

        DB::beginTransaction();

        /** @var Peserta $peserta */
        $peserta = Peserta::with('mahasiswa')->find($peserta_id);

        if ($request->post('proses') == 'Approve') {

            // Approve Peserta
            $peserta->is_approved = true;
            $peserta->approved_by = Auth::id(); // mendapatkan id yang sedang login
            $peserta->approved_at = date('Y-m-d H:i:s');
            $peserta->save();

            // Cek User
            /** @var User $userMahasiswa */
            $userMahasiswa = User::where('mahasiswa_id', $peserta->mahasiswa_id)->first();
            if ($userMahasiswa == null) {
                $userMahasiswa = new User();
                $userMahasiswa->username =
                    trim($peserta->mahasiswa->perguruanTinggi->kode_pt) . '-' .
                    trim($peserta->mahasiswa->nim);
                $userMahasiswa->mahasiswa_id = $peserta->mahasiswa_id;
                $userMahasiswa->name = $peserta->mahasiswa->nama;
                $userMahasiswa->email = $peserta->mahasiswa->email;
                $userMahasiswa->is_mail_verified = true;
                $userMahasiswa->email_verified_at = date('Y-m-d H:i:s');
                $userMahasiswa->password_plain = date('dmy', strtotime($peserta->mahasiswa->tgl_lahir));
                $userMahasiswa->password = Hash::make($userMahasiswa->password_plain);
                $userMahasiswa->is_active = true;
                $userMahasiswa->save();
            }

            DB::commit();

            // Send Email
            Mail::to($userMahasiswa)->send(new PesertaApproveMail($userMahasiswa));

        } elseif ($request->post('proses') == 'Reject') {

            // Reject Peserta
            $peserta->keterangan_reject = $request->post('keterangan_reject');
            $peserta->is_rejected = true;
            $peserta->rejected_by = Auth::id();
            $peserta->rejected_at = date('Y-m-d H:i:s');
            $peserta->save();

            DB::commit();

            // Get Mahasiswa Email Address
            $emailMahasiswa = Mahasiswa::find($peserta->mahasiswa_id)->value('email');

            // Send Email
            Mail::to($emailMahasiswa)->send(new PesertaRejectMail($peserta->keterangan_reject));
        }

        return redirect('admin/peserta/approval-processed')->with([
            'proses' => $request->post('proses')
        ]);
    }

    public function approvalProcessed()
    {
        return view('admin.peserta.approval_processed');
    }
    
    public function index()
    {
        $pesertas = $this->pesertaQueryBuilder()->whereNotNull('is_approved')->get();

        // Hitung umur
        foreach ($pesertas as $peserta) {
            $peserta->umur = date_diff(
                date_create($peserta->tgl_lahir),
                date_create($this->kegiatanAktif->tgl_batas_umur))
                ->format('%y Thn');
        }

        return view('admin.peserta.index', [
            'kegiatan' => $this->kegiatanAktif,
            'pesertas' => $pesertas
        ]);
    }

    public function edit($id)
    {
        dd($id);
        return 'oke';
    }

    public function rejected()
    {
        $pesertas = $this->pesertaQueryBuilder()
            ->whereNotNull('is_rejected')
            ->get();

        // Hitung umur
        foreach ($pesertas as $peserta) {
            $peserta->umur = date_diff(
                date_create($peserta->tgl_lahir),
                date_create($this->kegiatanAktif->tgl_batas_umur))
                ->format('%y Thn');
        }

        return view('admin.peserta.rejected', ['pesertas' => $pesertas]);
    }
}
