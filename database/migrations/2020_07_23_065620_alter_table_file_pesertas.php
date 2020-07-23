<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableFilePesertas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_pesertas', function (Blueprint $table) {
            $table->unsignedInteger('jenis_prestasi_id')->nullable()->change();
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
            $table->unsignedInteger('jenis_prestasi_id')->nullable(false)->change();
        });
    }
}
