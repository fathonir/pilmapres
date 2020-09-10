<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DownloadKUPesertaFinal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-ku-peserta-final';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download file KU peserta Final';

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
        $files = DB::select(
            "SELECT 
                p.id, m.nama, pt.nama_pt, 
                left(ps.nama_prodi, 1) as jenis,
                fp.nama_prestasi, fp.nama_lembaga_event,
                concat('https://pilmapres.kemdikbud.go.id/file/peserta/', p.kegiatan_id, '/', p.id, '/1/', fp.nama_file) as file_ku
            FROM pesertas p 
            JOIN tahapan_pesertas tp on tp.peserta_id = p.id and tp.tahapan_id = 3
            JOIN mahasiswas m on m.id = p.mahasiswa_id 
            join perguruan_tinggis pt on pt.id = m.perguruan_tinggi_id
            join program_studis ps on ps.id = m.program_studi_id
            join file_pesertas fp on fp.peserta_id = p.id and fp.syarat_id = 1 and fp.is_dinilai = 1
            order by 1");

        foreach ($files as $file) {
            $this->output->write('Download ' . $file->file_ku . ' ... ');
            $s = DIRECTORY_SEPARATOR;
            $jenis = $file->jenis == 'S' ? 'Sarjana' : 'Diploma';
            $dirTarget = base_path("download{$s}{$jenis}{$s}{$file->nama}");
            if (!file_exists($dirTarget)) { mkdir($dirTarget); }
            $pathinfo = pathinfo($file->file_ku);
            $filename = substr(basename($file->nama_prestasi), 0, 250);
            $safeFilename = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $filename);
            $savePath = $dirTarget.$s.$safeFilename.'.'.$pathinfo['extension'];
            file_put_contents($savePath, fopen($file->file_ku, 'r'));
            $this->output->writeln(' OK!');
        }
    }
}
