<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\PerguruanTinggi;
use Carbon\Carbon;
use Excel;

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
        $total_page = 10;
        $increment = 0;
        print_r('====== Start ======');
        echo "\n";

        for ($i=1; $i < $total_page ; $i++) {
            $res = $client->request('GET','https://api.ristekdikti.go.id:8243/pddikti/1.0/pt?page='.$i.'&per-page=1000', [
                        'verify'          => false,
                        'headers' => [
                        'Authorization' => 'Bearer d3f25dda-36dd-345c-89da-1473d5045f17',
                      ],
                    ]);
            $json = $res->getBody()->getContents();
            $objects = json_decode($json);
            if (!empty($objects)) {
                foreach ($objects as $key => $value) {
                    $increment++;
                    $perguruan_tinggi = PerguruanTinggi::where('id', $value->id)->first();
                    
                    if (empty($perguruan_tinggi)) {
                        $perguruan_tinggi = new PerguruanTinggi;
                        $perguruan_tinggi->id                   = $value->id;
                        print_r($increment. '. Insert data PT : '.$value->nama);
                        echo "\n";
                    }else{
                        print_r($increment. '. Update data PT : '.$value->nama);
                        echo "\n";
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
            }else{
                print_r('====== Finish ======');
                echo "\n";
                exit();
            }
        }
    }
}





















