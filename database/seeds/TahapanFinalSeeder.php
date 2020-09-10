<?php

use Illuminate\Database\Seeder;

class TahapanFinalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tahapans')->insert([
            ['id' => 4, 'nama_tahapan' => 'Presentasi Gagasan Kreatif'],
            ['id' => 5, 'nama_tahapan' => 'Wawancara Karya Unggulan'],
            ['id' => 6, 'nama_tahapan' => 'Presentasi Bahasa Inggris']
        ]);
    }
}
