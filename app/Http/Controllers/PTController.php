<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PTController extends Controller
{
    /**
     * API: /api/pt/$idPT/prodi
     * @param string $idPT
     */
    function prodi($idPT)
    {
        return DB::table('program_studis')
            ->select(['id', 'nama_prodi'])
            ->where('perguruan_tinggi_id', $idPT)
            ->orderBy('nama_prodi')
            ->get();
    }
    
    /**
     * API: /api/pt/$idPT/prodi/$idProdi/mahasiswa/$nim
     * @param string $idPT
     * @param string $idProdi
     * @param string $nim
     */
    function mahasiswa($ptID, $prodiID, $nim)
    {
        $nim = trim($nim);
        
        $mahasiswa = DB::table('mahasiswas')
            ->where([
                ['perguruan_tinggi_id', $ptID],
                ['program_studi_id', $prodiID],
                ['nim', $nim]
            ])->first();
        
        // Jika tidak ada di DB, ambil dari webservice
        if ($mahasiswa == null) {
            
            $pddikti_endpoint = env('PDDIKTI_ENDPOINT');
            $pddikti_key = env('PDDIKTI_KEY');
            
            $pt = DB::table('perguruan_tinggis')->select(['id', 'id_institusi'])->where('id', $ptID)->first();
            $prodi = DB::table('program_studis')->select(['id', 'id_pdpt'])->where('id', $prodiID)->first();
            
            // Jika pt / prodi tidak ditemukan, batalkan proses
            if ($pt == null || $prodi == null) {
                return;
            }
            
            $client = new \GuzzleHttp\Client();
            $request_url = "{$pddikti_endpoint}/pt/{$pt->id_institusi}/prodi/{$prodi->id_pdpt}/mahasiswa/{$nim}";
            $response = $client->request('GET', $request_url, [
                'verify' => false,
                'headers' => [
                    'Authorization' => 'Bearer ' . $pddikti_key,
                    'Accept' => 'application/json'
                ],
            ]);
            
            if ($response->getStatusCode() == 200) {
                
                $mahasiswaPDDiktis = \GuzzleHttp\json_decode($response->getBody()->getContents());
                $mahasiswaPDDikti = $mahasiswaPDDiktis[0];
                
                $mahasiswa = \App\Mahasiswa::create([
                    'perguruan_tinggi_id' => $pt->id,
                    'program_studi_id' => $prodi->id,
                    'nim' => trim($mahasiswaPDDikti->terdaftar->nim),
                    'nama' => trim($mahasiswaPDDikti->nama),
                    'tgl_lahir' => $mahasiswaPDDikti->tgl_lahir,
                    'angkatan' => substr($mahasiswaPDDikti->terdaftar->smt_mulai, 0, 4),
                    'email' => trim($mahasiswaPDDikti->email),
                    'no_hp' => trim($mahasiswaPDDikti->handphone),
                    'id_pdpt' => $mahasiswaPDDikti->id
                ]);
            }
        }
        
        return $mahasiswa;
    }
}
