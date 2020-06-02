<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * user_mahasiswas tidak digunakan,
         * menggunakan mahasiswa_id untuk relasi ke mahasiswa
         */
        
        Schema::dropIfExists('user_mahasiswas');
        
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('mahasiswa_id')->nullable()->after('remember_token');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_mahasiswa_id_foreign');
            $table->dropColumn('mahasiswa_id');
        });
        
        //
        // database/migrations/2017_01_21_085780_create_user_mahasiswa_table.php
        //
        Schema::create('user_mahasiswas', function (Blueprint $table) {
            $table->increments('id_user_mahasiswa',10);
            $table->string('foto')->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            $table->char('id_pd')->lenght(36);
            $table->string('surat_pengantar')->nullable();
            $table->timestamps();
        });
    }
}
