<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;

class Reviewer2020Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        DB::table('dosens')->insert([
            ['id' => 1, 'nidn' => '0008056206', 'nama' => 'Masrukhi', 'perguruan_tinggi_id' => 42, 'program_studi_id' => 5395],
            ['id' => 2, 'nidn' => '0009067006', 'nama' => 'Surfa Yondri', 'perguruan_tinggi_id' => 88, 'program_studi_id' => 7145],
            ['id' => 3, 'nidn' => '0011036905', 'nama' => 'Susatyo Nugroho Widyo Pramono', 'perguruan_tinggi_id' => 9, 'program_studi_id' => 1511],
            ['id' => 4, 'nidn' => '0005097701', 'nama' => 'Said Keliwar', 'perguruan_tinggi_id' => 105, 'program_studi_id' => 7611],
            ['id' => 5, 'nidn' => '0418086401', 'nama' => 'Agus Purnomo', 'perguruan_tinggi_id' => 1693, 'program_studi_id' => 15410],
            ['id' => 6, 'nidn' => '0014106502', 'nama' => 'Ruminto Subekti', 'perguruan_tinggi_id' => 80, 'program_studi_id' => 6905],
            ['id' => 7, 'nidn' => '510350', 'nama' => 'Haryanto', 'perguruan_tinggi_id' => 2, 'program_studi_id' => 118],
            ['id' => 8, 'nidn' => '0010036105', 'nama' => 'Anik M. Hariati', 'perguruan_tinggi_id' => 20, 'program_studi_id' => 2723],
            ['id' => 9, 'nidn' => '0106087503', 'nama' => 'Dewi Kesuma Nst', 'perguruan_tinggi_id' => 129, 'program_studi_id' => 7929],
            ['id' => 10, 'nidn' => '0031088301', 'nama' => 'Agus Fredy Maradona', 'perguruan_tinggi_id' => 2662, 'program_studi_id' => 21072],
        ]);

        $passwordHash = Hash::make('pilmapres2020');

        DB::table('users')->insert([
            ['dosen_id' => 1, 'name' => 'Masrukhi', 'username' => '0008056206', 'email' => 'masrukhi@mail.unnes.ac.id', 'password_plain' => 'pilmapres2020', 'password' => $passwordHash, 'is_active' => 1],
            ['dosen_id' => 2, 'name' => 'Surfa Yondri', 'username' => '0009067006', 'email' => 'surfa_yondri@yahoo.com', 'password_plain' => 'pilmapres2020', 'password' => $passwordHash, 'is_active' => 1],
            ['dosen_id' => 3, 'name' => 'Susatyo Nugroho Widyo Pramono', 'username' => '0011036905', 'email' => 'susatyo_nwp@live.undip.ac.id', 'password_plain' => 'pilmapres2020', 'password' => $passwordHash, 'is_active' => 1],
            ['dosen_id' => 4, 'name' => 'Said Keliwar', 'username' => '0005097701', 'email' => 'saidkeliwar@polnes.ac.id', 'password_plain' => 'pilmapres2020', 'password' => $passwordHash, 'is_active' => 1],
            ['dosen_id' => 5, 'name' => 'Agus Purnomo', 'username' => '0418086401', 'email' => 'aguspurnomo@poltekpos.ac.id', 'password_plain' => 'pilmapres2020', 'password' => $passwordHash, 'is_active' => 1],
            ['dosen_id' => 6, 'name' => 'Ruminto Subekti', 'username' => '0014106502', 'email' => 'ruminto_s@polman-bandung.ac.id', 'password_plain' => 'pilmapres2020', 'password' => $passwordHash, 'is_active' => 1],
            ['dosen_id' => 7, 'name' => 'Haryanto', 'username' => '510350', 'email' => 'sentot@ugm.ac.id', 'password_plain' => 'pilmapres2020', 'password' => $passwordHash, 'is_active' => 1],
            ['dosen_id' => 8, 'name' => 'Anik M. Hariati', 'username' => '0010036105', 'email' => 'a_hariati@ub.ac.id', 'password_plain' => 'pilmapres2020', 'password' => $passwordHash, 'is_active' => 1],
            ['dosen_id' => 9, 'name' => 'Dewi Kesuma Nst', 'username' => '0106087503', 'email' => 'dewikesuma@umsu.ac.id', 'password_plain' => 'pilmapres2020', 'password' => $passwordHash, 'is_active' => 1],
            ['dosen_id' => 10, 'name' => 'Agus Fredy Maradona', 'username' => '0031088301', 'email' => 'agusfredym@undiknas.ac.id', 'password_plain' => 'pilmapres2020', 'password' => $passwordHash, 'is_active' => 1],
        ]);

        // Tambah Role Reviewer
        DB::insert(
            "insert into user_groups (group_id, user_id, created_at, updated_at)
            select 3, id, current_timestamp(), current_timestamp() from users where dosen_id is not null");

        DB::commit();
    }
}
