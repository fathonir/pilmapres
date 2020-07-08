<?php

use Illuminate\Database\Seeder;

class TahapanPeserta2020Tahap1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert(
            "insert into tahapan_pesertas (peserta_id, tahapan_id , created_at , updated_at )
            select id, 1, current_timestamp(), current_timestamp()
            from pesertas p2 where is_approved = 1"
        );
    }
}
