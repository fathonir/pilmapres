<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsDinilaiToFilePeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_pesertas', function (Blueprint $table) {
            $table->boolean('is_dinilai')->default(true)->after('nilai');
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
            $table->dropColumn('is_dinilai');
        });
    }
}
