<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilePengantarPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_pengantar_pesertas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('peserta_id');
            $table->text('nama_file');
            $table->text('nama_asli');
            $table->integer('ukuran')->default(0);
            $table->timestamps();
            $table->foreign('peserta_id')->references('id')->on('pesertas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_pengantar_pesertas');
    }
}
