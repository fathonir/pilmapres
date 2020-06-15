<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableKegiatans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kegiatans', function(Blueprint $table) {
            $table->unsignedTinyInteger('batas_umur')->after('tgl_pengumuman');
            $table->date('tgl_batas_umur')->nullable()->after('batas_umur');
            $table->float('batas_ipk', 3, 2)->nullable()->after('tgl_batas_umur');
            $table->unsignedTinyInteger('batas_semester')->after('batas_ipk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kegiatans', function(Blueprint $table) {
            $table->dropColumn('batas_umur');
            $table->dropColumn('tgl_batas_umur');
            $table->dropColumn('batas_ipk');
            $table->dropColumn('batas_semester');
        });
    }
}
