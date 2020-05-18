<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\PerguruanTinggi;

class GetDataPTAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:get-data-pt-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Data All PT From Forlap';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $total_page = 100;
        $per_page = 100;
        $increment = 0;
        
        $pddikti_endpoint = env('PDDIKTI_ENDPOINT');
        $pddikti_key = env('PDDIKTI_KEY');
        
        echo "====== Start ======\n";
        echo "Endpoint: {$pddikti_endpoint}\n";
        echo "Key: {$pddikti_key}\n";

        for ($i = 0; $i < $total_page; $i++) {
            $res = $client->request('GET', "{$pddikti_endpoint}/pt?page={$i}&per-page={$per_page}", [
                'verify' => false,
                'headers' => [
                    'Authorization' => 'Bearer ' . $pddikti_key,
                ],
            ]);
            
            $json = $res->getBody()->getContents();
            $objects = json_decode($json);
            
            if (!empty($objects)) {
                foreach ($objects as $key => $value) {
                    $increment++;
                    $perguruan_tinggi = PerguruanTinggi::where('id', $value->id)->first();

                    // Jika PT bukan 00 Negeri / 01-14 LLDIKTI, Skip
                    if ((int)substr($value->kode, 0, 2) > 14) {
                        echo "{$increment} Skip PT : {$value->nama}\n";
                        continue 1;
                    }
                    
                    if ($perguruan_tinggi == null) {
                        $perguruan_tinggi = new PerguruanTinggi();
                        $perguruan_tinggi->id = $value->id;
                        echo "{$increment} Insert data PT : {$value->nama}\n";
                    } else {
                        echo "{$increment} Update data PT : {$value->nama}\n";
                    }

                    $perguruan_tinggi->kode                     = $value->kode;
                    $perguruan_tinggi->nama                     = $value->nama;
                    $perguruan_tinggi->nama_singkat             = $value->nama_singkat;
                    $perguruan_tinggi->sk_pendirian             = $value->sk_pendirian;
                    $perguruan_tinggi->tgl_sk_pendirian         = $value->tgl_sk_pendirian;
                    $perguruan_tinggi->sk_operasional           = $value->sk_operasional;
                    $perguruan_tinggi->tgl_sk_operasional       = $value->tgl_sk_operasional;
                    $perguruan_tinggi->status                   = $value->status;
                    $perguruan_tinggi->alamat_jalan             = $value->alamat->jalan;
                    $perguruan_tinggi->alamat_rt                = $value->alamat->rt;
                    $perguruan_tinggi->alamat_rw                = $value->alamat->rw;
                    $perguruan_tinggi->alamat_dusun             = $value->alamat->dusun;
                    $perguruan_tinggi->alamat_kelurahan         = $value->alamat->kelurahan;
                    $perguruan_tinggi->alamat_kode_pos          = $value->alamat->kode_pos;
                    $perguruan_tinggi->kota_id                  = $value->alamat->kab_kota->id;
                    $perguruan_tinggi->nama_kota                = $value->alamat->kab_kota->nama;
                    $perguruan_tinggi->provinsi_id              = $value->propinsi->id;
                    $perguruan_tinggi->provinsi_nama            = $value->propinsi->nama;
                    $perguruan_tinggi->telepon                  = $value->telepon;
                    $perguruan_tinggi->faksimile                = $value->faksimile;
                    $perguruan_tinggi->website                  = $value->website;
                    $perguruan_tinggi->email                    = $value->email;
                    $perguruan_tinggi->status_milik_id          = $value->status_milik->id;
                    $perguruan_tinggi->status_milik_nama        = $value->status_milik->nama;
                    $perguruan_tinggi->pembina_id               = $value->pembina->id;
                    $perguruan_tinggi->pembina_nama             = $value->pembina->nama;
                    $perguruan_tinggi->bentuk_pendidikan_id     = $value->bentuk_pendidikan->id;
                    $perguruan_tinggi->bentuk_pendidikan_nama   = $value->bentuk_pendidikan->nama;
                    $perguruan_tinggi->last_update              = $value->last_update;
                    $perguruan_tinggi->save();
                }
            } else {
                echo '====== Finish ======';
                break;
            }
        }
    }
}





















