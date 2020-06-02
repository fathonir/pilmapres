<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahapansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tahapans')->insert([
            ['id' => 1, 'nama_tahapan' => 'Babak Penyisihan Tahap 1'],
            ['id' => 2, 'nama_tahapan' => 'Babak Penyisihan Tahap 2'],
            ['id' => 3, 'nama_tahapan' => 'Babak Final']
        ]);
    }
}
