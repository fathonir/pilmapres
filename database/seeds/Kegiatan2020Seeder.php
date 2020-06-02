<?php

use Illuminate\Database\Seeder;

class Kegiatan2020Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kegiatans')->insert([
            'program_id' => 1,
            'tahun' => 2020,
            'peserta_per_pt' => 2,
            'tgl_awal_upload' => '2020-05-16 15:00:00',
            'tgl_akhir_upload' => '2020-06-16 15:00:00',
            'tgl_awal_review' => null,
            'tgl_akhir_review' => null,
            'tgl_pengumuman' => null,
            'is_aktif' => true,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
