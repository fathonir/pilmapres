<?php

use Illuminate\Database\Seeder;

class SyaratFileFinalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('syarats')->insert([
            ['id' => 3, 'kegiatan_id' => 1, 'tahapan_id' => 3, 'nama_syarat' => 'Biodata', 'allowed_types' => 'pdf', 'max_size' => '1024', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 4, 'kegiatan_id' => 1, 'tahapan_id' => 3, 'nama_syarat' => 'Poster Gagasan Kreatif', 'allowed_types' => 'jpg,jpeg', 'max_size' => '10240', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 5, 'kegiatan_id' => 1, 'tahapan_id' => 3, 'nama_syarat' => 'Poster Diri', 'allowed_types' => 'jpg,jpeg', 'max_size' => '10240', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 6, 'kegiatan_id' => 1, 'tahapan_id' => 3, 'nama_syarat' => 'Pakta Integritas', 'allowed_types' => 'pdf', 'max_size' => '2048', 'created_at' => date('Y-m-d H:i:s')],
        ]);
    }
}
