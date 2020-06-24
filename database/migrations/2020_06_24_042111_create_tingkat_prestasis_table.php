<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTingkatPrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tingkat_prestasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tingkat_prestasi');
        });

        Schema::table('file_pesertas', function (Blueprint $table) {
            $table->dropColumn('tingkat');
            $table->unsignedInteger('tingkat_prestasi_id')->nullable()->after('is_kelompok');
            $table->foreign('tingkat_prestasi_id')->references('id')->on('tingkat_prestasis');
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
            $table->string('tingkat')->nullable()->after('is_kelompok');
            $table->dropForeign('file_pesertas_tingkat_prestasi_id_foreign');
            $table->dropColumn('tingkat_prestasi_id');
        });

        Schema::dropIfExists('tingkat_prestasis');
    }
}
