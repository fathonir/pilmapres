<?php

namespace App\Console\Commands;

use App\Mahasiswa;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use GuzzleHttp;
use Illuminate\Support\Facades\DB;

class SyncSemesterIPK extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pddikti:sync-semester-ipk';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi Semester dan IPK Mahasiswa yang sudah terdapat di lokal';

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
        $client = new Client();

        $pddikti_endpoint = env('PDDIKTI_ENDPOINT');
        $pddikti_key = env('PDDIKTI_KEY');

        $this->line("SINKRONISASI DATA SEMESTER DAN IPK\n"
            . "Endpoint: {$pddikti_endpoint}\n"
            . "Key: {$pddikti_key}");

        /** @var Mahasiswa[] $mahasiswas */
        $mahasiswas = Mahasiswa::get();

        foreach ($mahasiswas as $mahasiswa) {
            $this->output->write(
                $mahasiswa->nama . ' ' .
                $mahasiswa->nim . '/' .
                $mahasiswa->programStudi->nama_prodi . '/' .
                $mahasiswa->perguruanTinggi->nama_pt . ' '
            );

            $request_url = $pddikti_endpoint .
                "/pt/" . $mahasiswa->perguruanTinggi->id_institusi .
                "/prodi/" . $mahasiswa->programStudi->id_pdpt.
                "/mahasiswa/" . $mahasiswa->nim;

            // Debug URL
            //$this->output->write("($request_url) ");

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
                    $this->output->writeln('Not Found');
                    continue;
                }

                $mahasiswaPDDikti = $mahasiswaPDDiktis[0];

                DB::beginTransaction();

                // Update Mahasiswa
                $mahasiswa->semester_terakhir = $mahasiswaPDDikti->terdaftar->smt_tempuh;
                $mahasiswa->ipk_terakhir = $mahasiswaPDDikti->terdaftar->ipk;
                $mahasiswa->save();

                // Update ke Peserta
                foreach ($mahasiswa->pesertas as $peserta) {
                    $peserta->semester_tempuh = $mahasiswaPDDikti->terdaftar->smt_tempuh;
                    $peserta->ipk = $mahasiswaPDDikti->terdaftar->ipk;
                    $peserta->save();
                }

                DB::commit();

                $this->output->writeln('OK');

            } else {
                $this->output->writeln('Error Status Code ' . $response->getStatusCode());
            }
        }

        $this->line('Selesai');
    }
}
