<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTahapanPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahapan_pesertas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('peserta_id');
            $table->unsignedInteger('tahapan_id');
            $table->integer('nilai_akhir')->default(0);
            $table->boolean('is_lolos')->default(false);
            $table->timestamps();
            $table->foreign('peserta_id')->references('id')->on('pesertas');
            $table->foreign('tahapan_id')->references('id')->on('tahapans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tahapan_pesertas');
    }
}
