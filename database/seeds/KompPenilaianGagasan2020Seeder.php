<?php

use App\Kegiatan;
use App\KelompokPeserta;
use App\Tahapan;
use Illuminate\Database\Seeder;

class KompPenilaianGagasan2020Seeder extends Seeder
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

        DB::table('komponen_penilaians')->insert([
            [
                'id' => 1,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 1,
                'kriteria' => 'Naskah ditulis dengan bahasa Indonesia yang baik dan benar',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 2,
                'kriteria' => 'Sumber yang dikutip dicantumkan dalam daftar pustaka / rujukan',
                'bobot' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 3,
                'kriteria' => 'Penulisan kutipan mengikuti kaidah yang berlaku',
                'bobot' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 4,
                'kriteria' => 'Ada alasan bagi pemilihan lingkungan (penerima manfaat)',
                'bobot' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 5,
                'kriteria' => 'Ada batasan pengertian mengenai lingkungan yang dipilih',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 6,
                'kriteria' => 'Ada uraian mengenai potensi dan kebutuhan lingkungan',
                'bobot' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 7,
                'kriteria' => 'Ada uraian mengenai akibat pembiaran yang merugikan lingkungan',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 8,
                'kriteria' => 'Ada uraian berciri SMART tentang sasaran yang ingin dicapai',
                'bobot' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 9,
                'kriteria' => 'Ada uraian mengenai keuntungan jika sasaran tercapai',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 10,
                'kriteria' => 'Ada uraian dampak lanjutan (efek bola salju) dari pencapaian sasaran',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 11,
                'kriteria' => 'Ada uraian rinci mengenai langkah-langkah pencapaian sasaran',
                'bobot' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 12,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 12,
                'kriteria' => 'Ada uraian mengenai antisipasi kemungkinan hambatan',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 13,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 13,
                'kriteria' => 'Ada informasi mengenai jumlah dan kemungkinan sumber dana',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 14,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 14,
                'kriteria' => 'Ada uraian tentang struktur organisasi pelaksana program',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 15,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 15,
                'kriteria' => 'Ada uraian mengenai kemungkinan reaksi para stakeholder',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 16,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 16,
                'kriteria' => 'Kreativitas Gagasan',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 17,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 17,
                'kriteria' => 'Manfaat Pelaksanaan Gagasan',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 18,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 18,
                'kriteria' => 'Kemungkinan Implementasi Gagasan',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 19,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::SARJANA,
                'urutan' => 19,
                'kriteria' => 'Rasionalitas Gagasan',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 20,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 1,
                'kriteria' => 'Naskah ditulis dengan bahasa Indonesia yang baik dan benar',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 21,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 2,
                'kriteria' => 'Sumber yang dikutip dicantumkan dalam daftar pustaka / rujukan',
                'bobot' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 22,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 3,
                'kriteria' => 'Penulisan kutipan mengikuti kaidah yang berlaku',
                'bobot' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 23,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 4,
                'kriteria' => 'Ada alasan bagi pemilihan lingkungan (penerima manfaat)',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 24,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 5,
                'kriteria' => 'Ada batasan pengertian mengenai lingkungan yang dipilih',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 25,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 6,
                'kriteria' => 'Ada uraian mengenai potensi dan kebutuhan lingkungan',
                'bobot' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 26,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 7,
                'kriteria' => 'Ada uraian mengenai akibat pembiaran yang merugikan lingkungan',
                'bobot' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 27,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 8,
                'kriteria' => 'Ada uraian berciri SMART tentang sasaran yang ingin dicapai',
                'bobot' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 28,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 9,
                'kriteria' => 'Ada uraian mengenai keuntungan jika sasaran tercapai',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 29,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 10,
                'kriteria' => 'Ada uraian dampak lanjutan (efek bola salju) dari pencapaian sasaran',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 30,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 11,
                'kriteria' => 'Ada uraian rinci mengenai langkah-langkah pencapaian sasaran',
                'bobot' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 31,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 12,
                'kriteria' => 'Ada uraian mengenai antisipasi kemungkinan hambatan',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 32,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 13,
                'kriteria' => 'Ada informasi mengenai jumlah dan kemungkinan sumber dana',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 33,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 14,
                'kriteria' => 'Ada uraian tentang struktur organisasi pelaksana program',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 34,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 15,
                'kriteria' => 'Ada uraian mengenai kemungkinan reaksi para stakeholder',
                'bobot' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 35,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 16,
                'kriteria' => 'Kreativitas Gagasan',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 36,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 17,
                'kriteria' => 'Manfaat Pelaksanaan Gagasan',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 37,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 18,
                'kriteria' => 'Kemungkinan Implementasi Gagasan',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 38,
                'kegiatan_id' => $kegiatan->id,
                'tahapan_id' => Tahapan::BABAK_PENYISIHAN_2,
                'kelompok_peserta_id' => KelompokPeserta::DIPLOMA,
                'urutan' => 19,
                'kriteria' => 'Rasionalitas Gagasan',
                'bobot' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
