<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHasilPenilaians extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_penilaians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plot_reviewer_id');
            $table->unsignedInteger('file_peserta_id')->nullable();
            $table->float('skor');
            $table->float('nilai');
            $table->text('komentar')->nullable();
            $table->timestamps();
            $table->foreign('plot_reviewer_id')->references('id')->on('plot_reviewers');
            $table->foreign('file_peserta_id')->references('id')->on('file_pesertas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_penilaians');
    }
}
