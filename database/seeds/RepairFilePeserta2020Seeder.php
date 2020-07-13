<?php

use App\Kegiatan;
use App\Peserta;
use App\Tahapan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RepairFilePeserta2020Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kegiatan 2020
        $kegiatan = Kegiatan::where(['tahun' => 2020])->first();

        /** @var Peserta[] $pesertas */
        $pesertas = Peserta::with(['mahasiswa:id,nama', 'filePesertas'])
            ->has('filePesertas', '<', 10)
            ->where('is_approved', 1)
            ->orderBy('id')->get();

        DB::beginTransaction();

        $n = 1;
        foreach ($pesertas as $peserta) {
            $this->command->line($n . ' ' . $peserta->mahasiswa->nama . ' ' . count($peserta->filePesertas));

            $filePesertaPath = strtr(config('app.file_peserta_path'), [
                '{kegiatan_id}' => $kegiatan->id,
                '{peserta_id}' => $peserta->id,
                '{tahapan_id}' => Tahapan::BABAK_PENYISIHAN_1,
            ]);

            $this->command->line('  ' . $filePesertaPath);

            // Ambil seluruh file yang ada dalam folder peserta
            if (File::exists(public_path($filePesertaPath))) {

                $files = File::files(public_path($filePesertaPath));

                // Sort Files by MTime ASC
                usort($files, function ($file1, $file2) {
                    if ($file1->getMTime() == $file2->getMTime()) {
                        return 0;
                    }
                    elseif ($file1->getMTime() < $file2->getMTime()) {
                        return -1;
                    }
                    else {
                        return 1;
                    }
                });

                foreach ($files as $file) {

                    $rowExist = false;
                    $filePesertaId = 0;
                    foreach ($peserta->filePesertas as $filePeserta) {
                        if ($file->getFilename() == $filePeserta->nama_file) {
                            $rowExist = true;
                            $filePesertaId = $filePeserta->id;
                            break;
                        }
                    }

                    if ($rowExist) {
                        $this->command->line(
                            '  '.
                            $file->getFilename().' '.
                            date('Y-m-d H:i:s', $file->getMTime()).' : '.
                            $filePesertaId
                        );
                    } else {
                        // Jika tidak ada dibuat row record baru untuk file pdf
                        if ($file->getExtension() == 'pdf') {
                            DB::table('file_pesertas')->insert([
                                'peserta_id' => $peserta->id,
                                'syarat_id' => 1, // Syarat portofolio 2020
                                'nama_file' => $file->getFilename(),
                                'nama_asli' => $file->getFilename(),
                                'ukuran' => $file->getSize(),
                                'jenis_prestasi_id' => 1,
                                'nama_prestasi' => '[PERLU DIUPDATE]',
                                'is_dinilai' => 0,
                                'is_need_edit' => 1,
                                'tingkat_prestasi_id' => 6, // Fakultas Prodi
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ]);
                        }

                        $this->command->line(
                            '  '.
                            $file->getFilename().' '.
                            date('Y-m-d H:i:s', $file->getMTime()).' : INSERT'
                        );
                    }

                }
            }

            $n++;
        }

        DB::commit();
    }
}
