<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kegiatan_id');
            $table->unsignedInteger('tahapan_id');
            $table->dateTime('tgl_awal_upload');
            $table->dateTime('tgl_akhir_upload');
            $table->dateTime('tgl_akhir_edit_upload')->nullable();
            $table->dateTime('tgl_awal_review')->nullable();
            $table->dateTime('tgl_akhir_review')->nullable();
            $table->dateTime('tgl_pengumuman')->nullable();
            $table->timestamps();
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans');
            $table->foreign('tahapan_id')->references('id')->on('tahapans');
        });

        // Move Data
        DB::statement(
            "insert into jadwal_kegiatans (
                kegiatan_id, tahapan_id, tgl_awal_upload, tgl_akhir_upload, tgl_akhir_edit_upload, tgl_awal_review,
                tgl_akhir_review, tgl_pengumuman, created_at, updated_at)
                select id, 1, tgl_awal_upload, tgl_akhir_upload, tgl_akhir_edit_upload, tgl_awal_review,
                tgl_akhir_review, tgl_pengumuman, current_timestamp(), current_timestamp()
                from kegiatans"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_kegiatans');
    }
}
