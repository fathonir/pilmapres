<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetDataProdiAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pddikti:get-data-prodi-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data Program Studi dari PDDIKTI';

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
        $per_page = 500;
        $increment = 0;
        
        $pddikti_endpoint = env('PDDIKTI_ENDPOINT');
        $pddikti_key = env('PDDIKTI_KEY');
        
        $this->line("SINKRONISASI DATA PROGRAM STUDI\nEndpoint: {$pddikti_endpoint}\nKey: {$pddikti_key}");
       
        $perguruan_tinggis = DB::table('perguruan_tinggis')->get();
        
        foreach ($perguruan_tinggis as $pt) {
            
            $this->line($pt->kode_pt . ": " . $pt->nama_pt);
            
            $request_url = "{$pddikti_endpoint}/pt/{$pt->id_institusi}/prodi?per-page=500";
            $response = $client->request('GET', $request_url, [
                'verify' => false,
                'headers' => [
                    'Authorization' => 'Bearer ' . $pddikti_key,
                    'Accept' => 'application/json'
                ],
            ]);
            
            if ($response->getStatusCode() == 200) {
                
                $prodi_pddiktis = \GuzzleHttp\json_decode($response->getBody()->getContents());
                
                foreach ($prodi_pddiktis as $prodi_pddikti) {
                    
                    $program_studi = \App\ProgramStudi::where('id_pdpt', $prodi_pddikti->id)->first();
                    
                    if ($program_studi == null) {
                        $program_studi = new \App\ProgramStudi();
                        $program_studi->id_pdpt = $prodi_pddikti->id;
                    }
                    
                    $program_studi->perguruan_tinggi_id = $pt->id;
                    $program_studi->kode_prodi = trim($prodi_pddikti->kode);
                    $program_studi->nama_prodi = 
                        $prodi_pddikti->jenjang_didik->nama . ' ' . 
                        $prodi_pddikti->nama;
                    $program_studi->save();
                    
                    $this->line('  ' . $program_studi->kode_prodi . ' ' . $program_studi->nama_prodi);
                }
                
            } else {
                $this->error($response->getReasonPhrase());
            }
        }
    }
}
