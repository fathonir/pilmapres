<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTahapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahapans', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nama_tahapan');
            $table->unsignedSmallInteger('jenis_penilaian')->default(1)
                ->comment('1-Komponen; 2-Lolos/Tidak Lolos');  
            $table->boolean('is_aktif')->default(true);
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
        Schema::dropIfExists('tahapans');
    }
}
