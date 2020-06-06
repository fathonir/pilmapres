<?php

namespace App\Http\Controllers;

use File;
use Auth;
use Input;
use Alert;
use App\FilePengantarPeserta;
use App\Kegiatan;
use App\Mahasiswa;
use App\PerguruanTinggi;
use App\Peserta;
use App\User;
use App\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

class RegisterPesertaController extends Controller
{
    public function index()
    {
        $perguruanTinggis = PerguruanTinggi::all();
        return view('register-peserta/index', ['perguruanTinggis' => $perguruanTinggis]);
    }

    public function store(Request $request)
    {
        // Ambil kegiatan Pilmapres aktif
        /** @var \App\Kegiatan $kegiatan */
        $kegiatan = Kegiatan::with('program')->where('is_aktif', true)->first();

        // Validasi Kegiatan masih aktif dan pada jadwal
        if ($kegiatan == null) {
            return view('register-peserta/store', [
                'alert_type' => 'danger',
                'alert_message' => 'Tidak ada kegiatan PILMAPRES aktif. Silahkan hubungi Admin'
            ]);
        } elseif (time() < strtotime($kegiatan->tgl_awal_upload) || strtotime($kegiatan->tgl_akhir_upload) < time()) {
            return view('register-peserta/store', [
                'alert_type' => 'warning',
                'alert_message' => 'Diluar jadwal PILMAPRES. Silahkan hubungi Admin'
            ]);
        } elseif ( ! $request->hasFile('file_pengantar')) {
            return view('register-peserta/store', [
                'alert_type' => 'error',
                'alert_message' => 'Surat Pengantar harus ada. Silahkan ulangi registrasi'
            ]);
        } elseif ( ! $request->file('file_pengantar')->isValid()) {
            return view('register-peserta/store', [
                'alert_type' => 'error',
                'alert_message' => 'Surat Pengantar harus ada. Silahkan ulangi registrasi'
            ]);
        }

        DB::beginTransaction();
        
        /** @var \App\Mahasiswa $mahasiswa */
        $mahasiswa = Mahasiswa::find($request->input('mahasiswa_id'));

        /** @var \App\Peserta $peserta */
        $peserta = new Peserta();
        $peserta->kegiatan_id = $kegiatan->id;
        $peserta->mahasiswa_id = $request->input('mahasiswa_id');
        $peserta->save();

        $uploadedFilePengantar = $request->file('file_pengantar');
        $destinationFile = sha1($peserta->id) . '.' . strtolower($uploadedFilePengantar->getClientOriginalExtension());
        $destinationPath = public_path(env('SURAT_PENGANTAR_PATH'));
        
        if ( ! File::exists($destinationPath)) {
            if (File::makeDirectory($destinationPath, 0777, true)) {
                return view('register-peserta/store', [
                    'alert_type' => 'error',
                    'alert_message' => 'Unable to upload to invoices directory make sure it is read / writable.'
                ]);
            }
        }

        $uploadedFilePengantar->move($destinationPath, $destinationFile);

        /** @var \App\FilePengantarPeserta $filePengantarPeserta */
        $filePengantarPeserta = new FilePengantarPeserta();
        $filePengantarPeserta->peserta_id = $peserta->id;
        $filePengantarPeserta->nama_asli = $uploadedFilePengantar->getClientOriginalName();
        $filePengantarPeserta->nama_file = $destinationFile;
        $filePengantarPeserta->ukuran = $uploadedFilePengantar->getClientSize();
        $filePengantarPeserta->save();

        if (!$peserta || !$filePengantarPeserta) {
            DB::rollBack();
            return view('register-peserta/store', [
                'alert_type' => 'error',
                'alert_message' => 'Gagal simpan data.'
            ]);
        } else {
            DB::commit();
            return view('register-peserta/store', [
                'alert_type' => 'success',
                'alert_message' => 'Selamat, Anda berhasil melakukan pendaftaran. '
                . 'Admin akan melakukan verifikasi Surat Rekomendasi. '
                . 'Login ke sistem akan dikirimkan jika memenuhi syarat.'
            ]);
        }

//        $user = User::where('mahasiswa_id', $request->input('mahasiswa_id'))->first();
//
//        // If Mahasiswa belum punya login, Create
//        if ($user == null) {
//            $user = new User();
//            $user->name = $mahasiswa->nama;
//            $user->email = trim($request->input('email'));
//            $user->password = '';
//            $user->is_mail_verified = true;
//            $user->save();
//            
//            // Update Email Mahasiswa
//            $mahasiswa->email = $user->email;
//            $mahasiswa->save();
//        }

        
    }

    public function registerSuccess()
    {
        $base_path = base_path();
        $process = new Process('php artisan add:test-job > /dev/null 2>&1 &', $base_path);
        $process->disableOutput();
        $process->run();

        Alert::success('Data anda akan segera kami proses. '
            . 'Mohon menunggu proses aktivasi akun dan segera melakukan verifikasi email anda. '
            . 'Kami telah mengirim email verifikasi ke indra@gmail.com Berhasil!')
            ->persistent("Tutup");

        return view('register-peserta-sukses');
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (isset($verifyUser)) {

            $user = User::where('id', $verifyUser->user_id)->first();

            if (!$user->is_mail_verified) {

                $user->is_mail_verified = 1;
                $user->email_verified_at = date("Y-m-d H:m:s");
                $user->save();
                $status = "Your e-mail is verified. You can now login.";

                if (Auth::check()) {
                    Alert::success('Email anda telah terverifikasi.', 'Berhasil!')->persistent("Tutup");
                    return redirect('/home');
                }
                Alert::success('Email anda telah terverifikasi. Silahkan login', 'Berhasil!')->persistent("Tutup");
                return redirect('/login');

            } else {

                if (Auth::check()) {
                    Alert::success('Email anda telah terverifikasi.', 'Berhasil!')->persistent("Tutup");
                    return redirect('/home');
                }

                $status = "Your e-mail is already verified. You can now login.";
                Alert::success('Email anda telah terverifikasi sebelumnya. Silahkan login', 'Berhasil!')->persistent("Tutup");
                return redirect('/login');
            }
        } else {
            Alert::error('Link verifikasi email kadaluarsa', 'Gagal!')->persistent("Tutup");
            return redirect('/login');
        }
    }

}
