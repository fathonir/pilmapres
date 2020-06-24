<?php

use Illuminate\Database\Seeder;

class JenisPrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelompok_prestasis')->insert([
            ['id' => 1, 'kelompok_prestasi' => 'Prestasi Kompetisi Bidang'],
            ['id' => 2, 'kelompok_prestasi' => 'Berperan'],
            ['id' => 3, 'kelompok_prestasi' => 'Menghasilkan'],
            ['id' => 4, 'kelompok_prestasi' => 'Perolehan'],
            ['id' => 5, 'kelompok_prestasi' => 'Capaian Karier di Organisasi'],
        ]);

        DB::table('jenis_prestasis')->insert([
            ['kelompok_prestasi_id' => 1, 'jenis_prestasi' => 'Ilmiah / Penalaran / Akademik'],
            ['kelompok_prestasi_id' => 1, 'jenis_prestasi' => 'Seni-Budaya'],
            ['kelompok_prestasi_id' => 1, 'jenis_prestasi' => 'Olah Raga'],
            ['kelompok_prestasi_id' => 1, 'jenis_prestasi' => 'Teknologi & Sains, serta Inovasi'],
            ['kelompok_prestasi_id' => 1, 'jenis_prestasi' => 'Keagamaan'],
            ['kelompok_prestasi_id' => 1, 'jenis_prestasi' => 'Kewirausahaan'],

            ['kelompok_prestasi_id' => 2, 'jenis_prestasi' => 'Pemakalah/Penyaji/Narasumber/Pemandu, ' .
                'Moderator dalam forum ilmiah/seminar/FGD/konferensi/lokakarya/pelatihan'],
            ['kelompok_prestasi_id' => 2, 'jenis_prestasi' => 'Wirausahawan (Enterpreneur)'],
            ['kelompok_prestasi_id' => 2, 'jenis_prestasi' => 'Pelatih/wasit/juri/coach/adjudicator'],
            ['kelompok_prestasi_id' => 2, 'jenis_prestasi' => 'Pemberdaya masyarakat'],
            ['kelompok_prestasi_id' => 2, 'jenis_prestasi' => 'Ketua/koordinator kepanitiaan dalam ' .
                'kegiatan tingkat provinsi/nasional/regional/internasional'],

            ['kelompok_prestasi_id' => 3, 'jenis_prestasi' => 'Temuan inovatif'],
            ['kelompok_prestasi_id' => 3, 'jenis_prestasi' => 'Karya yang telah mendapatkan HaKI'],
            ['kelompok_prestasi_id' => 3, 'jenis_prestasi' => 'Literatur berupa buku, artikel, karya tulis, ' .
                'cerpen, novel, lagu/hasil seni yang dipublikasikan/diterbitkan'],
            ['kelompok_prestasi_id' => 3, 'jenis_prestasi' => 'Produk di bidang seni/olah raga/teknologi'],

            ['kelompok_prestasi_id' => 4, 'jenis_prestasi' => 'HaKI'],
            ['kelompok_prestasi_id' => 4, 'jenis_prestasi' => 'Anugerah'],

            ['kelompok_prestasi_id' => 5, 'jenis_prestasi' => 'BEM / Senat Mahasiswa / Dewan Perwakilan Mahasiswa ' .
                '/ Majelis Permusyawaratan Mahasiswa / Himpunan Mahasiswa'],
            ['kelompok_prestasi_id' => 5, 'jenis_prestasi' => 'Unit Kegiatan Mahasiswa'],
            ['kelompok_prestasi_id' => 5, 'jenis_prestasi' => 'Badan Semi Otonom'],
            ['kelompok_prestasi_id' => 5, 'jenis_prestasi' => 'Organisasi profesi mahasiswa'],
            ['kelompok_prestasi_id' => 5, 'jenis_prestasi' => 'Organisasi sosial kemasyarakatan'],
        ]);
    }
}
