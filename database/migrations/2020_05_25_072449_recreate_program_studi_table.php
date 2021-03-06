<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class RecreateProgramStudiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('program_studis');
        
        Schema::create('program_studis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('perguruan_tinggi_id')->unsigned(); // FK to Increments PK >> UNSIGNED INT
            $table->string('kode_prodi', 6);
            $table->text('nama_prodi');
            $table->char('id_pdpt', 36);
            $table->timestamps();
            $table->foreign('perguruan_tinggi_id')->references('id')->on('perguruan_tinggis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_studis');
        
        //
        // database/migrations/2020_04_25_094693_create_program_studis_table.php
        //
        Schema::create('program_studis', function (Blueprint $table) {
            $table->char('id')->length(36);
            $table->char('kode', 20)->default(0)->nullable();
            $table->string('nama')->length(500)->nullable();
            $table->string('status')->length(50)->nullable();
            $table->char('id_pt')->length(36);
            $table->char('kode_pt', 20)->default(0)->nullable();
            $table->string('nama_pt')->length(128)->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('kompetensi')->length(128)->nullable();
            $table->string('jalan')->length(128)->nullable();
            $table->string('telepon')->length(50)->nullable();
            $table->string('faksimile')->length(128)->nullable();
            $table->string('website')->length(128)->nullable();
            $table->string('email')->length(128)->nullable();
            $table->char('kab_kota_id', 15)->nullable();
            $table->string('kab_kota_nama')->length(128)->nullable();
            $table->char('id_jenjang_didik', 3)->nullable();
            $table->string('nama_jenjang_didik')->length(100)->nullable();
            $table->string('tgl_berdiri')->length(20)->nullable();
            $table->string('sk_selenggara')->length(100)->nullable();
            $table->string('tgl_sk_selenggara')->length(20)->nullable();
            $table->string('sks_lulus')->length(20)->nullable();
            $table->string('kode_pos')->length(20)->nullable();
            $table->string('last_update')->length(20)->nullable();
            $table->primary('id');
            $table->timestamps();
        });
    }
}
