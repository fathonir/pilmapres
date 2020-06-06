<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('program_id');
            $table->unsignedSmallInteger('tahun');
            $table->unsignedTinyInteger('peserta_per_pt')->default(0);
            $table->dateTime('tgl_awal_upload')->nullable();
            $table->dateTime('tgl_akhir_upload')->nullable();
            $table->dateTime('tgl_awal_review')->nullable();
            $table->dateTime('tgl_akhir_review')->nullable();
            $table->dateTime('tgl_pengumuman')->nullable();
            $table->boolean('is_aktif')->default(false);
            $table->timestamps();
            $table->foreign('program_id')->references('id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatans');
    }
}
