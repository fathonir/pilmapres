<?php

namespace App\Http\Controllers\Mahasiswa;

use App\FilePeserta;
use App\Kegiatan;
use App\KelompokPrestasi;
use App\Mahasiswa;
use App\Peserta;
use App\Syarat;
use App\Tahapan;
use App\TingkatPrestasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PortofolioController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::where('is_aktif', true)->first();
        $mahasiswa = Auth::user()->mahasiswa;
        $tahapan = Tahapan::where('nama_tahapan', 'Babak Penyisihan Tahap 1')->first();
        $peserta = Peserta::where(['kegiatan_id' => $kegiatan->id, 'mahasiswa_id' => $mahasiswa->id])->first();

        $filePesertaPathEnv = env('FILE_PESERTA_PATH');
        $filePesertaPath = strtr($filePesertaPathEnv, [
            '{kegiatan_id}' => $kegiatan->id,
            '{peserta_id}' => $peserta->id,
            '{tahapan_id}' => $tahapan->id,
        ]);

        return view('mahasiswa.portofolio.index', compact('peserta', 'filePesertaPath'));
    }

    public function create()
    {
        $kelompokPrestasis = KelompokPrestasi::with('jenisPrestasis')->get();
        $tingkatPrestasis = TingkatPrestasi::get();
        return view('mahasiswa.portofolio.create', compact('kelompokPrestasis', 'tingkatPrestasis'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_prestasi_id' => 'required',
            'file_bukti' => 'file|mimetypes:application/pdf',
            'nama_prestasi' => 'required',
            'tahun' => 'required|numeric',
            'nama_lembaga_event' => 'required',
            'tingkat_prestasi_id' => 'required',
            'jumlah_peserta' => 'numeric',
            'jumlah_penghargaan_pada_event' => 'numeric'
        ], [
            'jenis_prestasi_id.required' => 'Pilih Jenis Prestasi',
            'file_bukti.required' => 'File Bukti perlu di unggah',
        ]);

        if ($validator->fails()) {
            return redirect('mahasiswa/portofolio/create')
                ->withErrors($validator)
                ->withInput();
        }

        // TODO: Logic ini deprecated, perlu di ganti apabila ganti tahun
        /** @var Kegiatan $kegiatan */
        $kegiatan = Kegiatan::where('is_aktif', true)->first();

        /** @var Mahasiswa $mahasiswa */
        $mahasiswa = Auth::user()->mahasiswa;

        /** @var Peserta $peserta */
        $peserta = Peserta::where(['kegiatan_id' => $kegiatan->id, 'mahasiswa_id' => $mahasiswa->id])->first();

        /** @var Tahapan $tahapan */
        $tahapan = Tahapan::where('nama_tahapan', 'Babak Penyisihan Tahap 1')->first();

        /** @var Syarat $syarat */
        $syarat = Syarat::where('nama_syarat', 'Portofolio')->first();

        // Folder Tujuan
        $destPathConfig = env('FILE_PESERTA_PATH');
        $destPath = public_path(
            strtr($destPathConfig, [
                '{kegiatan_id}' => $kegiatan->id,
                '{peserta_id}' => $peserta->id,
                '{tahapan_id}' => $tahapan->id,
            ])
        );

        // Buat foldernya
        if ( ! File::exists($destPath)) {
            // Jika gagal buat folder
            if ( ! File::makeDirectory($destPath, 0777, true)) {
                return "Unable to upload. Make sure {$destPath} is writeable.";
            }
        }

        // File tujuan
        $fileBukti = $request->file('file_bukti');
        $destFile = sha1(time()).'.'.strtolower($fileBukti->getClientOriginalExtension());
        $fileBukti->move($destPath, $destFile);

        // Row file peserta
        $filePeserta = new FilePeserta();
        $filePeserta->peserta_id            = $peserta->id;
        $filePeserta->syarat_id             = $syarat->id;
        $filePeserta->nama_file             = $destFile;
        $filePeserta->nama_asli             = $fileBukti->getClientOriginalName();
        $filePeserta->ukuran                = $fileBukti->getClientSize();
        $filePeserta->jenis_prestasi_id     = $request->input('jenis_prestasi_id');
        $filePeserta->nama_prestasi         = $request->input('nama_prestasi');
        $filePeserta->tahun                 = $request->input('tahun');
        $filePeserta->nama_lembaga_event    = $request->input('nama_lembaga_event');
        $filePeserta->is_kelompok           = $request->input('is_kelompok');
        $filePeserta->tingkat_prestasi_id   = $request->input('tingkat_prestasi_id');
        $filePeserta->jumlah_peserta        = $request->input('jumlah_peserta');
        $filePeserta->jumlah_penghargaan_pada_event = $request->input('jumlah_penghargaan_pada_event');
        $filePeserta->nilai                 = 0;
        $filePeserta->save();

        return redirect('mahasiswa/portofolio/store-success')
            ->with(['message' => 'Portofolio berhasil disimpan']);
    }

    public function storeSuccess()
    {
        return view('mahasiswa.portofolio.store_success');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
