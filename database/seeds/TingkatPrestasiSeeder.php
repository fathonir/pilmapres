<?php

use Illuminate\Database\Seeder;

class TingkatPrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tingkat_prestasis')->insert([
            ['tingkat_prestasi' => 'Internasional'],
            ['tingkat_prestasi' => 'Regional'],
            ['tingkat_prestasi' => 'Nasional'],
            ['tingkat_prestasi' => 'Wilayah'],
            ['tingkat_prestasi' => 'PT / Provinsi'],
            ['tingkat_prestasi' => 'Fakultas / Prodi'],
        ]);
    }
}
