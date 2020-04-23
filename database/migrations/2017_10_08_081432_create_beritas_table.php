<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_berita_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('judul');
            $table->text('isi_berita');
            $table->string('gambar');
            $table->char('tanggal')->nullable();
            $table->string('file')->nullable();
            $table->string('viewers')->nullable();
            $table->foreign('category_berita_id')->references('id')->on('category_beritas');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('beritas');
    }
}
