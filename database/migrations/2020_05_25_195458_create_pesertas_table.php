<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kegiatan_id');
            $table->unsignedInteger('mahasiswa_id');
            $table->boolean('is_approved')->null();
            $table->unsignedInteger('user_id_approve')->null();
            $table->dateTime('approve_at')->null();
            $table->boolean('is_rejected')->null();
            $table->unsignedInteger('user_id_reject')->null();
            $table->dateTime('reject_at')->null();
            $table->timestamps();
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas');
            $table->foreign('user_id_approve')->references('id')->on('users');
            $table->foreign('user_id_reject')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
}
