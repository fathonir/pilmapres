<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Kegiatan;
use App\Mahasiswa;
use App\Peserta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $peserta = Peserta::where([
            'mahasiswa_id' => $mahasiswa->id,
            'kegiatan_id' => $kegiatan->id
        ])->first();

        return view('mahasiswa.home.index', compact('kegiatan', 'mahasiswa', 'peserta'));
    }
}
