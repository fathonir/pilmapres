<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKomponenPenilaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komponen_penilaians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kegiatan_id');
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans');
            $table->unsignedInteger('tahapan_id');
            $table->foreign('tahapan_id')->references('id')->on('tahapans');
            $table->unsignedSmallInteger('urutan');
            $table->text('kriteria');
            $table->integer('bobot');
            $table->timestamps();
        });

        Schema::table('hasil_penilaians', function (Blueprint $table) {
            $table->unsignedInteger('komponen_penilaian_id')->nullable()->after('file_peserta_id');
            $table->foreign('komponen_penilaian_id')->references('id')->on('komponen_penilaians');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hasil_penilaians', function (Blueprint $table) {
            $table->dropForeign(['komponen_penilaian_id']);
            $table->dropColumn('komponen_penilaian_id');
        });

        Schema::dropIfExists('komponen_penilaians');
    }
}
