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
    protected $signature = 'pddikti:get-data-pt-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data PT dari PDDIKTI';

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
        
        $this->line("SINKRONISASI DATA PERGURUAN TINGGI\n"
            . "Endpoint: {$pddikti_endpoint}\n"
            . "Key: {$pddikti_key}");
            
        

        for ($i = 0; $i < $total_page; $i++) {
            
            $request_url = "{$pddikti_endpoint}/pt?page={$i}&per-page={$per_page}";
            
            $res = $client->request('GET', $request_url, [
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
                    $perguruan_tinggi = PerguruanTinggi::where('id_institusi', $value->id)->first();

                    // Jika PT bukan 00 Negeri / 01-14 LLDIKTI, Skip
                    if ((int)substr($value->kode, 0, 2) > 14) {
                        $this->line("{$increment} Skip PT : {$value->nama}");
                        continue 1;
                    }
                    
                    if ($perguruan_tinggi == null) {
                        $perguruan_tinggi = new PerguruanTinggi();
                        $this->line("{$increment} Insert data PT : {$value->nama}");
                    } else {
                        $this->line("{$increment} Update data PT : {$value->nama}");
                    }

                    $perguruan_tinggi->kode_pt      = trim($value->kode);
                    $perguruan_tinggi->nama_pt      = $value->nama;
                    $perguruan_tinggi->id_institusi = $value->id;
                    $perguruan_tinggi->save();
                    
                }
            } else {
                $this->line('====== Finish ======');
                break;
            }
        }
    }
}





















