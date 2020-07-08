<?php

use Illuminate\Database\Seeder;

class Deploy20200708Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SkorSeeder::class,
            TahapanPeserta2020Tahap1Seeder::class,
            PlotFileDinilai2020Seeder::class,
            Reviewer2020Seeder::class
        ]);
    }
}
