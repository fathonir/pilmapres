<?php

use Illuminate\Database\Seeder;

class SkorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelompok_skors')->insert([
            ['id' => 1, 'kelompok_skor' => 'Nilai Pencapaian Prestasi'],
            ['id' => 2, 'kelompok_skor' => 'Nilai Penghargaan / Pengakuan'],
            ['id' => 3, 'kelompok_skor' => 'Nilai Kepemimpinan'],
        ]);

        DB::table('skors')->insert([
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Internasional - Individu - Juara 1', 'skor' => 13],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Internasional - Individu - Juara 2', 'skor' => 12],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Internasional - Individu - Juara 3', 'skor' => 11],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Internasional - Kelompok - Juara 1', 'skor' => 6.5],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Internasional - Kelompok - Juara 2', 'skor' => 6.0],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Internasional - Kelompok - Juara 3', 'skor' => 5.5],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Regional - Individu - Juara 1', 'skor' => 10],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Regional - Individu - Juara 2', 'skor' => 9],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Regional - Individu - Juara 3', 'skor' => 8],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Regional - Kelompok - Juara 1', 'skor' => 5.0],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Regional - Kelompok - Juara 2', 'skor' => 4.5],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Regional - Kelompok - Juara 3', 'skor' => 4.0],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Nasional - Individu - Juara 1', 'skor' => 7],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Nasional - Individu - Juara 2', 'skor' => 6],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Nasional - Individu - Juara 3', 'skor' => 5],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Nasional - Kelompok - Juara 1', 'skor' => 3.5],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Nasional - Kelompok - Juara 2', 'skor' => 3.0],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Nasional - Kelompok - Juara 3', 'skor' => 2.5],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Provinsi - Individu - Juara 1', 'skor' => 4],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Provinsi - Individu - Juara 2', 'skor' => 3],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Provinsi - Individu - Juara 3', 'skor' => 2],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Provinsi - Kelompok - Juara 1', 'skor' => 2.0],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Provinsi - Kelompok - Juara 2', 'skor' => 1.5],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 1, 'nama_skor' => 'Provinsi - Kelompok - Juara 3', 'skor' => 1.0],

            ['tahapan_id' => 1, 'kelompok_skor_id' => 2, 'nama_skor' => 'Internasional - Individu', 'skor' => 8],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 2, 'nama_skor' => 'Internasional - Kelompok', 'skor' => 4],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 2, 'nama_skor' => 'Regional - Individu', 'skor' => 6],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 2, 'nama_skor' => 'Regional - Kelompok', 'skor' => 3],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 2, 'nama_skor' => 'Nasional - Individu', 'skor' => 4],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 2, 'nama_skor' => 'Nasional - Kelompok', 'skor' => 2],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 2, 'nama_skor' => 'PT/Provinsi - Individu', 'skor' => 2],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 2, 'nama_skor' => 'PT/Provinsi - Kelompok', 'skor' => 1],

            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Internasional - Ormawa Gol I - Ketua', 'skor' => 12],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Internasional - Ormawa Gol I - Pengurus', 'skor' => 10],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Regional - Ormawa Gol I - Ketua', 'skor' => 11],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Regional - Ormawa Gol I - Pengurus', 'skor' => 9],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Nasional - Ormawa Gol I - Ketua', 'skor' => 10],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Nasional - Ormawa Gol I - Pengurus', 'skor' => 8],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Wilayah - Ormawa Gol I - Ketua', 'skor' => 9],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Wilayah - Ormawa Gol I - Pengurus', 'skor' => 7],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'PT/Provinsi - Ormawa Gol I - Ketua', 'skor' => 8],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'PT/Provinsi - Ormawa Gol I - Pengurus', 'skor' => 6],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Fakultas/Prodi - Ormawa Gol I - Ketua', 'skor' => 7],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Fakultas/Prodi - Ormawa Gol I - Pengurus', 'skor' => 5],

            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Internasional - Ormawa Gol II - Ketua', 'skor' => 8],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Internasional - Ormawa Gol II - Pengurus', 'skor' => 6],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Regional - Ormawa Gol II - Ketua', 'skor' => 7],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Regional - Ormawa Gol II - Pengurus', 'skor' => 5],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Nasional - Ormawa Gol II - Ketua', 'skor' => 6],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Nasional - Ormawa Gol II - Pengurus', 'skor' => 4],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Wilayah - Ormawa Gol II - Ketua', 'skor' => 5],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Wilayah - Ormawa Gol II - Pengurus', 'skor' => 3],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'PT/Provinsi - Ormawa Gol II - Ketua', 'skor' => 4],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'PT/Provinsi - Ormawa Gol II - Pengurus', 'skor' => 2],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Fakultas/Prodi - Ormawa Gol II - Ketua', 'skor' => 3],
            ['tahapan_id' => 1, 'kelompok_skor_id' => 3, 'nama_skor' => 'Fakultas/Prodi - Ormawa Gol II - Pengurus', 'skor' => 1],
        ]);
    }
}
