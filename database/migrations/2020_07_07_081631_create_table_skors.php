<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSkors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_skors', function (Blueprint $table) {
            $table->increments('id');
            $table->text('kelompok_skor');
        });

        Schema::create('skors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tahapan_id');
            $table->unsignedInteger('kelompok_skor_id');
            $table->text('nama_skor');
            $table->float('skor');
            $table->foreign('tahapan_id')->references('id')->on('tahapans');
            $table->foreign('kelompok_skor_id')->references('id')->on('kelompok_skors');
        });

        Schema::table('hasil_penilaians', function (Blueprint $table) {
            $table->unsignedInteger('skor_id')->nullable()->after('file_peserta_id');
            $table->foreign('skor_id')->references('id')->on('skors');
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
            $table->dropForeign('hasil_penilaians_skor_id_foreign');
            $table->dropColumn('skor_id');
        });
        Schema::dropIfExists('skors');
        Schema::dropIfExists('kelompok_skors');
    }
}
