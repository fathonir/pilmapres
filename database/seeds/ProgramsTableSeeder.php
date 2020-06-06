<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            'id' => \App\Program::PILMAPRES,
            'nama_program' => 'Pemilihan Mahasiswa Berprestasi',
            'nama_program_singkat' => 'PILMAPRES'
        ]);
    }
}
