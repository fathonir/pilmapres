<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mahasiswas', function (Blueprint $table) {
            $table->increments('id_user_mahasiswa',10);
            $table->string('foto')->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            $table->char('id_pd')->lenght(36);
            $table->string('surat_pengantar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_mahasiswas');
    }
}
