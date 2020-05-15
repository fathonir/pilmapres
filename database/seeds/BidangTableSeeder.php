<?php

use App\Bidang;
use Illuminate\Database\Seeder;

class BidangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bidang = new Bidang();
        $bidang->nama = 'IPA';
        $bidang->deskripsi = '-';
        $bidang->active = 1;
        $bidang->save();

        $bidang = new Bidang();
        $bidang->nama = 'IPS';
        $bidang->deskripsi = '-';
        $bidang->active = 1;
        $bidang->save();
    }
}
