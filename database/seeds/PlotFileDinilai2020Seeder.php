<?php

use Illuminate\Database\Seeder;

class PlotFileDinilai2020Seeder extends Seeder
{
    /**
     * Memplot hanya 10 file pertama saja yang dinilai
     *
     * @return void
     */
    public function run()
    {
        // Reset File Peserta
        DB::update('update file_pesertas set is_dinilai = 0');

        $pesertas = DB::select(
            "select p.id, m.nama from pesertas p 
            join file_pesertas fp on fp.peserta_id = p.id
            join mahasiswas m on m.id = p.mahasiswa_id
            where is_approved = 1 and p.kegiatan_id = 1
            group by p.id, m.nama having count(fp.id) >= 10");

        foreach ($pesertas as $peserta) {
            //$this->command->line($peserta->id . ' ' . $peserta->nama);

            $filePesertas = DB::select(
                "select * from file_pesertas where peserta_id = ? order by created_at asc limit 10",
                [$peserta->id]);

            DB::beginTransaction();

            $n = 1;
            foreach ($filePesertas as $filePeserta) {
                DB::update("update file_pesertas set is_dinilai = 1 where id = ?", [$filePeserta->id]);
                //$this->command->line('  ' . $n . '-' . $filePeserta->nama_file);
                $n++;
            }

            DB::commit();
        }

        $this->command->line(count($pesertas) . ' peserta berhasil diupdate');
    }
}
