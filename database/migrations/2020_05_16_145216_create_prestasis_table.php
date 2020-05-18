<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('prioritas')->unsigned()->nullable();
            $table->string('nama_prestasi')->nullable();
            $table->string('pencapaian')->nullable();
            $table->string('tahun')->nullable();
            $table->string('tingkat')->nullable();
            $table->string('pemberi_event')->nullable();
            $table->string('individu_kelompok')->nullable();
            $table->string('sertifikat')->nullable();
            $table->text('keterangan_tambahan')->nullable();
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('prestasis');
    }
}
