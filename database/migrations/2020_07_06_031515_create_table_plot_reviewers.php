<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlotReviewers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_reviewers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tahapan_peserta_id');
            $table->unsignedInteger('dosen_id');
            $table->smallInteger('no_urut');
            $table->float('nilai_reviewer')->nullable();
            $table->text('komentar')->nullable();
            $table->boolean('is_permanen');
            $table->timestamps();
            $table->foreign('tahapan_peserta_id')->references('id')->on('tahapan_pesertas');
            $table->foreign('dosen_id')->references('id')->on('dosens');
            $table->unique(['tahapan_peserta_id', 'dosen_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plot_reviewers');
    }
}
