<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSyaratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syarats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kegiatan_id');
            $table->unsignedInteger('tahapan_id');
            $table->text('nama_syarat');
            $table->text('deskripsi')->nullable();
            $table->boolean('is_wajib')->default(true);
            $table->boolean('is_upload')->default(true);
            $table->boolean('is_aktif')->default(true);
            $table->text('allowed_types')->nullable();
            $table->integer('max_size')->default(0);
            $table->boolean('is_administrasi')->default(false);
            $table->boolean('is_multi')->default(false)->comment('Bisa multi upload');
            $table->boolean('is_portofolio')->default(false)->comment('Merupakan portofolio');
            $table->unsignedTinyInteger('max_multi_upload')->default(1);
            $table->timestamps();
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans');
            $table->foreign('tahapan_id')->references('id')->on('tahapans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('syarats');
    }
}
