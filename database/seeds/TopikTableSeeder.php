<?php

use App\Topik;
use Illuminate\Database\Seeder;

class TopikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topik = new Topik();
        $topik->nama = 'Ilmiah/Penalaran/Akademik';
        $topik->deskripsi = '-';
        $topik->active = 1;
        $topik->save();

        $topik = new Topik();
        $topik->nama = 'Seni-Budaya';
        $topik->deskripsi = '-';
        $topik->active = 1;
        $topik->save();

        $topik = new Topik();
        $topik->nama = 'Olah Raga';
        $topik->deskripsi = '-';
        $topik->active = 1;
        $topik->save();

        $topik = new Topik();
        $topik->nama = 'Teknologi & Sains, serta Inovasi';
        $topik->deskripsi = '-';
        $topik->active = 1;
        $topik->save();
        
        $topik = new Topik();
        $topik->nama = 'Keagamaan';
        $topik->deskripsi = '-';
        $topik->active = 1;
        $topik->save();

        $topik = new Topik();
        $topik->nama = 'Kewirausahaan';
        $topik->deskripsi = '-';
        $topik->active = 1;
        $topik->save();
    }
}
