<?php

use App\Kegiatan;
use App\KelompokPeserta;
use App\Tahapan;
use Illuminate\Database\Seeder;

class KompPenilaianFinalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kegiatan 2020
        $kegiatan = Kegiatan::where(['tahun' => 2020])->first();

        // PRESENTASI GAGASAN KREATIF
        DB::table('komponen_penilaians')->insert([
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 1,
                'kriteria' => 'Poster',
                'bobot' => 15,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 2,
                'kriteria' => 'Sistematika Penjelasan',
                'bobot' => 15,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 3,
                'kriteria' => 'Cara Menjelaskan',
                'bobot' => 15,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 4,
                'kriteria' => 'Ketepatan Waktu',
                'bobot' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 5,
                'kriteria' => 'Ketepatan Jawaban',
                'bobot' => 30,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 6,
                'kriteria' => 'Cara Menjawab',
                'bobot' => 20,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 1,
                'kriteria' => 'Poster',
                'bobot' => 15,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 2,
                'kriteria' => 'Sistematika Penjelasan',
                'bobot' => 15,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 3,
                'kriteria' => 'Cara Menjelaskan',
                'bobot' => 15,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 4,
                'kriteria' => 'Ketepatan Waktu',
                'bobot' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 5,
                'kriteria' => 'Ketepatan Jawaban : Penguasaan Materi',
                'bobot' => 20,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 6,
                'kriteria' => 'Ketepatan Jawaban : Demo Produk / Prototype',
                'bobot' => 20,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_GAGASAN_KREATIF,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 7,
                'kriteria' => 'Cara Menjawab',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);

        // WAWANCARA KARYA UNGGULAN
        DB::table('komponen_penilaians')->insert([
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::WAWANCARA_KARYA_UNGGULAN,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 1,
                'kriteria' => '<strong>Verifikasi:</strong>' .
                    '<ul><li>Keaslian Data Prestasi</li>' .
                    '<li>Kelayakan dan Kepatutan</li>' .
                    '<li>Kejujuran</li></ul>',
                'bobot' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::WAWANCARA_KARYA_UNGGULAN,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 2,
                'kriteria' => '<strong>Wawasan:</strong> ' .
                    'Penjiwaan dan penguasaan materi (kompetisi dan rekognisi)',
                'bobot' => 30,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::WAWANCARA_KARYA_UNGGULAN,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 3,
                'kriteria' => '<strong>Sikap dan Perilaku:</strong> Ekspresi, Etika, Percaya Diri',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::WAWANCARA_KARYA_UNGGULAN,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 4,
                'kriteria' => '<strong>Cara Menjawab:</strong> Berfikir Kritis, Kreatif, Inisiatif, Kemampuan komunikasi, argumentasi ',
                'bobot' => 20,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::WAWANCARA_KARYA_UNGGULAN,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 5,
                'kriteria' => '<strong>Leadership:</strong> Kemampuan Koordinasi dan pemberdayaan',
                'bobot' => 15,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::WAWANCARA_KARYA_UNGGULAN,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 1,
                'kriteria' => '<strong>Verifikasi:</strong>' .
                    '<ul><li>Keaslian Data Prestasi</li>' .
                    '<li>Kelayakan dan Kepatutan</li>' .
                    '<li>Kejujuran</li></ul>',
                'bobot' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::WAWANCARA_KARYA_UNGGULAN,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 2,
                'kriteria' => '<strong>Wawasan:</strong> ' .
                    'Penjiwaan dan penguasaan materi (kompetisi dan rekognisi)',
                'bobot' => 30,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::WAWANCARA_KARYA_UNGGULAN,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 3,
                'kriteria' => '<strong>Sikap dan Perilaku:</strong> Ekspresi, Etika, Percaya Diri',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::WAWANCARA_KARYA_UNGGULAN,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 4,
                'kriteria' => '<strong>Cara Menjawab:</strong> Berfikir Kritis, Kreatif, Inisiatif, Kemampuan komunikasi, argumentasi ',
                'bobot' => 20,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::WAWANCARA_KARYA_UNGGULAN,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 5,
                'kriteria' => '<strong>Leadership:</strong> Kemampuan Koordinasi dan pemberdayaan',
                'bobot' => 15,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);

        // PRESENTASI BAHASA INGGRIS
        DB::table('komponen_penilaians')->insert([
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_BAHASA_INGGRIS,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 1,
                'kriteria' => '<strong>CONTENT</strong> (Max 25)',
                'bobot' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_BAHASA_INGGRIS,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 2,
                'kriteria' => '<strong>ACCURACY</strong> (Max 25)',
                'bobot' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_BAHASA_INGGRIS,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 3,
                'kriteria' => '<strong>FLUENCY &amp; PRONUNCIATION</strong> (Max 20)',
                'bobot' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_BAHASA_INGGRIS,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 4,
                'kriteria' => '<strong>COMPREHENSION &amp; RESPONSE</strong> (Max 20)',
                'bobot' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_BAHASA_INGGRIS,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 5,
                'kriteria' => '<strong>OVERALL PERFORMANCE</strong> (Max 10)',
                'bobot' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_BAHASA_INGGRIS,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 1,
                'kriteria' => '<strong>CONTENT</strong> (Max 25)',
                'bobot' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_BAHASA_INGGRIS,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 2,
                'kriteria' => '<strong>ACCURACY</strong> (Max 25)',
                'bobot' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_BAHASA_INGGRIS,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 3,
                'kriteria' => '<strong>FLUENCY &amp; PRONUNCIATION</strong> (Max 20)',
                'bobot' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_BAHASA_INGGRIS,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 4,
                'kriteria' => '<strong>COMPREHENSION &amp; RESPONSE</strong> (Max 20)',
                'bobot' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::PRESENTASI_BAHASA_INGGRIS,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 5,
                'kriteria' => '<strong>OVERALL PERFORMANCE</strong> (Max 10)',
                'bobot' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
