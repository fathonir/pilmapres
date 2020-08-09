<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelompokPesertas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_pesertas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('kelompok_peserta');
            $table->timestamps();
        });

        // Insert Master Data
        DB::table('kelompok_pesertas')->insert([
            ['id' => 1, 'kelompok_peserta' => 'Sarjana'],
            ['id' => 2, 'kelompok_peserta' => 'Diploma']
        ]);

        Schema::table('pesertas', function (Blueprint $table) {
            $table->unsignedInteger('kelompok_peserta_id')->nullable()->after('mahasiswa_id');
            $table->foreign('kelompok_peserta_id')->references('id')->on('kelompok_pesertas');
        });

        // Update data
        DB::statement(
            "update pesertas set kelompok_peserta_id = 1 where id in (
                select p.id from pesertas p
                join mahasiswas m on m.id = p.mahasiswa_id
                join program_studis ps on ps.id = m.program_studi_id
                where ps.nama_prodi like 'S%')");

        DB::statement(
            "update pesertas set kelompok_peserta_id = 2 where id in (
                select p.id from pesertas p
                join mahasiswas m on m.id = p.mahasiswa_id
                join program_studis ps on ps.id = m.program_studi_id
                where ps.nama_prodi like 'D%')");

        Schema::table('pesertas', function (Blueprint $table) {
            $table->unsignedInteger('kelompok_peserta_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesertas', function (Blueprint $table) {
            $table->dropForeign(['kelompok_peserta_id']);
            $table->dropColumn('kelompok_peserta_id');
        });
    }
}
