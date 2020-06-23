<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengumumanController extends Controller
{
    public function userPeserta($kegiatan_id)
    {
        $kegiatan = Kegiatan::where('is_aktif', true)->first();
        $pesertas = DB::table('pesertas as p')
            ->select(['m.nama', 'ps.nama_prodi', 'pt.nama_pt', 'u.username'])
            ->join('mahasiswas as m', 'm.id', '=', 'p.mahasiswa_id')
            ->join('program_studis as ps', 'ps.id', '=', 'm.program_studi_id')
            ->join('perguruan_tinggis as pt', 'pt.id', '=', 'm.perguruan_tinggi_id')
            ->join('users as u', 'u.mahasiswa_id', '=', 'm.id')
            ->whereNotNull('p.is_approved')
            ->orderBy('m.nama')
            ->get();

        return view('pengumuman.user_peserta', compact('kegiatan', 'pesertas'));
    }
}
