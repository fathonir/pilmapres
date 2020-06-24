<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_pesertas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('peserta_id');
            $table->unsignedInteger('syarat_id');
            $table->text('nama_file');
            $table->text('nama_asli');
            $table->integer('ukuran')->default(0);
            $table->text('nama_prestasi')->nullable();
            $table->text('capaian')->nullable();
            $table->unsignedSmallInteger('tahun')->nullable();
            $table->text('nama_lembaga_event')->nullable()->commet('Nama Lembaga / Event');
            $table->boolean('is_kelompok')->nullable()->default(null);
            $table->text('tingkat')->nullable();
            $table->unsignedInteger('jumlah_peserta')->nullable();
            $table->unsignedInteger('jumlah_penghargaan_pada_event')->nullable();
            $table->float('nilai')->nullable();
            $table->timestamps();
            $table->foreign('peserta_id')->references('id')->on('pesertas');
            $table->foreign('syarat_id')->references('id')->on('syarats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_pesertas');
    }
}
