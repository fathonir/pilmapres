<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
     * API: /api/pt/$ptID/prodi/$prodiID/mahasiswa/$nim
     * @param string $ptID
     * @param string $prodiID
     * @param string $nim
     */
    function mahasiswa($ptID, $prodiID, $nim)
    {
        $nim = trim($nim);
        
        $mahasiswa = \App\Mahasiswa::with(['perguruanTinggi', 'programStudi'])
            ->where([
                ['perguruan_tinggi_id', $ptID],
                ['program_studi_id', $prodiID],
                ['nim', $nim]
            ])->first();
        
        if ($mahasiswa != null) {
            return $mahasiswa;
        }
        
        $pddikti_endpoint = env('PDDIKTI_ENDPOINT');
        $pddikti_key = env('PDDIKTI_KEY');

        $pt = \App\PerguruanTinggi::find($ptID);
        $prodi = \App\ProgramStudi::find($prodiID);

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
                'tempat_lahir' => $mahasiswaPDDikti->tempat_lahir,
                'angkatan' => substr($mahasiswaPDDikti->terdaftar->smt_mulai, 0, 4),
                'email' => trim($mahasiswaPDDikti->email),
                'no_hp' => trim($mahasiswaPDDikti->handphone),
                'id_pdpt' => $mahasiswaPDDikti->id
            ]);
            
            // Recursively Call
            return $this->mahasiswa($ptID, $prodiID, $nim);
        }
        
        return;
    }
}
