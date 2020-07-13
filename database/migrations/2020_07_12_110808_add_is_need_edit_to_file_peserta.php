<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsNeedEditToFilePeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_pesertas', function (Blueprint $table) {
            $table->boolean('is_need_edit')->default(0)->after('is_dinilai');
        });

        Schema::table('kegiatans', function (Blueprint $table) {
            $table->dateTime('tgl_akhir_edit_upload')->nullable()->after('tgl_akhir_upload');
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
            $table->dropColumn('is_need_edit');
        });

        Schema::table('kegiatans', function (Blueprint $table) {
            $table->dropColumn('tgl_akhir_edit_upload');
        });
    }
}
