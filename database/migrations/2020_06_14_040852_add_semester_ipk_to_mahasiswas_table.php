<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSemesterIpkToMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->unsignedTinyInteger('semester_terakhir')->default(0)
                ->after('angkatan')->comment('Semester Terakhir');
            $table->float('ipk_terakhir', 3, 2)->default(0)
                ->after('semester_terakhir')->comment('IPK Terakhir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropColumn('semester_terakhir');
            $table->dropColumn('ipk_terakhir');
        });
    }
}
