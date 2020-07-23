<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Kegiatan;
use App\Mahasiswa;
use App\Peserta;
use App\Tahapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

class HomeController extends Controller
{
    public function index()
    {
        /** @var Kegiatan $kegiatan */
        $kegiatan = Kegiatan::where('is_aktif', true)->first();
        $mahasiswa = Mahasiswa::find(Auth::user()->mahasiswa_id);

        // Check Photo
        $mahasiswa->photoExist = ($mahasiswa->photo != null);
        $mahasiswa->photoUrl = url(config('app.photo_mahasiswa_path') . '/' . $mahasiswa->photo);

        // Hitung Umur
        $mahasiswa->umur = (new \DateTime($mahasiswa->tgl_lahir))->diff(new \DateTime($kegiatan->tgl_batas_umur))
            ->format('%y tahun %m bulan %d hari');

        // Mendapatkan data peserta dari kegiatan aktif
        /** @var Peserta $peserta */
        $peserta = Peserta::where([
            'mahasiswa_id' => $mahasiswa->id,
            'kegiatan_id' => $kegiatan->id,
            'is_approved' => 1
        ])->first();

        $isLolosTahap2 = $peserta->isLolosTahap2();

        return view('mahasiswa.home.index', compact('kegiatan', 'mahasiswa', 'peserta', 'isLolosTahap2'));
    }
}
