<?php

use App\Tahapan;
use Illuminate\Database\Seeder;

class SkorGagasanKreatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelompok_skors')->insert([
            ['id' => 4, 'kelompok_skor' => 'Nilai Skala 5 - 10']
        ]);

        $tahapan_id = Tahapan::BABAK_PENYISIHAN_2;

        DB::table('skors')->insert([
            ['tahapan_id' => $tahapan_id, 'kelompok_skor_id' => 4, 'nama_skor' => '5', 'skor' => 5],
            ['tahapan_id' => $tahapan_id, 'kelompok_skor_id' => 4, 'nama_skor' => '6', 'skor' => 6],
            ['tahapan_id' => $tahapan_id, 'kelompok_skor_id' => 4, 'nama_skor' => '7', 'skor' => 7],
            ['tahapan_id' => $tahapan_id, 'kelompok_skor_id' => 4, 'nama_skor' => '8', 'skor' => 8],
            ['tahapan_id' => $tahapan_id, 'kelompok_skor_id' => 4, 'nama_skor' => '9', 'skor' => 9],
            ['tahapan_id' => $tahapan_id, 'kelompok_skor_id' => 4, 'nama_skor' => '10', 'skor' => 10],
        ]);
    }
}
