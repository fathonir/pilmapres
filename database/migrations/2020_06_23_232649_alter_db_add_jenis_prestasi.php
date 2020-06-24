<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDbAddJenisPrestasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_prestasis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('kelompok_prestasi');
        });

        Schema::create('jenis_prestasis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('jenis_prestasi');
            $table->unsignedInteger('kelompok_prestasi_id');
            $table->foreign('kelompok_prestasi_id')->references('id')->on('kelompok_prestasis');
        });

        Schema::table('file_pesertas', function (Blueprint $table) {
            $table->dropColumn('capaian');
            $table->unsignedInteger('jenis_prestasi_id')->after('ukuran');
            $table->foreign('jenis_prestasi_id')->references('id')->on('jenis_prestasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('file_pesertas', function (Blueprint $table) {
            $table->string('capaian')->nullable()->after('nama_prestasi');
            $table->dropForeign('file_pesertas_jenis_prestasi_id_foreign');
            $table->dropColumn('jenis_prestasi_id');
        });
        Schema::drop('jenis_prestasis');
        Schema::drop('kelompok_prestasis');
    }
}
