<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\PerguruanTinggi;
use App\ProgramStudi;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
     * API: /api/pt/$ptID/prodi/$prodiID/mahasiswa?nim=$nim
     * @param string $ptID
     * @param string $prodiID
     */
    function mahasiswa(Request $request, $ptID, $prodiID)
    {
        $nim = trim($request->get('nim'));

        /** @var Mahasiswa $mahasiswa */
        $mahasiswa = Mahasiswa::with(['perguruanTinggi', 'programStudi'])
            ->where([
                ['perguruan_tinggi_id', $ptID],
                ['program_studi_id', $prodiID],
                ['nim', $nim]
            ])->first();
        
        $pddikti_endpoint = env('PDDIKTI_ENDPOINT');
        $pddikti_key = env('PDDIKTI_KEY');

        $pt = PerguruanTinggi::find($ptID);
        $prodi = ProgramStudi::find($prodiID);

        // Jika pt / prodi tidak ditemukan, batalkan proses
        if ($pt == null || $prodi == null) {
            return;
        }

        $client = new Client();
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
            
            if (count($mahasiswaPDDiktis) == 0) {
                return;
            }
            
            $mahasiswaPDDikti = $mahasiswaPDDiktis[0];

            if ($mahasiswa == null) {
                $mahasiswa = Mahasiswa::create([
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
            } else {
                $mahasiswa->semester_terakhir = $mahasiswaPDDikti->terdaftar->smt_tempuh;
                $mahasiswa->ipk_terakhir = $mahasiswaPDDikti->terdaftar->ipk;
                $mahasiswa->save();
            }
            
            return $mahasiswa;
        }
        
        return;
    }
}
