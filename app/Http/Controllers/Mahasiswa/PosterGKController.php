<?php

namespace App\Http\Controllers\Mahasiswa;

use App\FilePeserta;
use App\Kegiatan;
use App\Peserta;
use App\Syarat;
use App\Tahapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PosterGKController extends Controller
{
    private const POSTER_GAGASAN_KREATIF = 'Poster Gagasan Kreatif';

    public function index()
    {
        $kegiatan = Kegiatan::where('is_aktif', true)->first();
        $jadwalKegiatan = $kegiatan->jadwalKegiatans()->where(['tahapan_id' => Tahapan::BABAK_FINAL])->first();
        $syarat = $kegiatan->syarats()->where(['nama_syarat' => self::POSTER_GAGASAN_KREATIF])->first();
        $mahasiswa = Auth::user()->mahasiswa;

        // Mendapatkan data peserta dari kegiatan aktif
        $peserta = Peserta::getFromMahasiswa($mahasiswa->id, $kegiatan->id);

        // Restricted khusus peserta lolos tahap 2
        if ( ! $peserta->isLolosTahapFinal()) {
            return redirect('mahasiswa/home');
        }

        $filePesertaPathEnv = config('app.file_peserta_path');
        $filePesertaPath = strtr($filePesertaPathEnv, [
            '{kegiatan_id}' => $kegiatan->id,
            '{peserta_id}' => $peserta->id,
            '{tahapan_id}' => Tahapan::BABAK_FINAL,
        ]);

        $filePeserta = $peserta->filePesertas()->where(['syarat_id' => $syarat->id])->first();

        $now = date('Y-m-d H:i:s');
        $isJadwalAvailable = ($jadwalKegiatan->tgl_awal_upload <= $now) && ($now <= $jadwalKegiatan->tgl_akhir_upload);

        return view('mahasiswa.poster_gk.index', compact(
            'jadwalKegiatan', 'filePesertaPath', 'filePeserta', 'syarat', 'isJadwalAvailable'));
    }

    public function store(Request $request)
    {
        /** @var Kegiatan $kegiatan */
        $kegiatan = Kegiatan::where('is_aktif', true)->first();
        $syarat = $kegiatan->syarats()->where(['nama_syarat' => self::POSTER_GAGASAN_KREATIF])->first();

        /** @var Validator $validator */
        $validator = Validator::make($request->all(), [
            'filePosterGK' => "file|mimes:{$syarat->allowed_types}|max:{$syarat->max_size}"
        ]);

        if ($validator->fails()) {
            return redirect('mahasiswa/poster-gk')->withErrors($validator);
        }

        $mahasiswa = Auth::user()->mahasiswa;

        // Mendapatkan data peserta dari kegiatan aktif
        $peserta = Peserta::getFromMahasiswa($mahasiswa->id, $kegiatan->id);

        // Folder Tujuan
        $destPathConfig = config('app.file_peserta_path');
        $destPath = public_path(
            strtr($destPathConfig, [
                '{kegiatan_id}' => $kegiatan->id,
                '{peserta_id}' => $peserta->id,
                '{tahapan_id}' => Tahapan::BABAK_FINAL,
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
        $filePosterGK = $request->file('filePosterGK');
        $destFile = sha1(time()).'.'.strtolower($filePosterGK->getClientOriginalExtension());
        $filesize = $filePosterGK->getSize();
        $filePosterGK->move($destPath, $destFile);

        $filePeserta = $peserta->filePesertas()->where(['syarat_id' => $syarat->id])->first();

        if ($filePeserta == null) {
            $filePeserta                = new FilePeserta();
            $filePeserta->peserta_id    = $peserta->id;
            $filePeserta->syarat_id     = $syarat->id;
        }

        $filePeserta->nama_file     = $destFile;
        $filePeserta->nama_asli     = $filePosterGK->getClientOriginalName();
        $filePeserta->ukuran        = $filesize;
        $filePeserta->save();

        return redirect('mahasiswa/poster-gk')
            ->with(['alert-success' => true]);
    }
}
