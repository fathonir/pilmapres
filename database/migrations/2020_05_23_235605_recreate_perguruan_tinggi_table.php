<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreatePerguruanTinggiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('perguruan_tinggis');
        
        Schema::create('perguruan_tinggis', function(Blueprint $table) {
            $table->increments('id');
            $table->char('kode_pt', 6);
            $table->text('nama_pt');
            $table->char('id_institusi', 36);
            $table->timestamps();
            $table->unique('id_institusi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perguruan_tinggis');
        
        //
        // database/migrations/2020_04_25_094613_create_perguruan_tinggis_table.php
        // 
        Schema::create('perguruan_tinggis', function (Blueprint $table) {
            $table->char('id')->length(36);
            $table->char('kode', 20)->default(0)->nullable();
            $table->string('nama')->length(500)->nullable();
            $table->string('nama_singkat')->length(200)->nullable();
            $table->string('sk_pendirian')->length(150)->nullable();
            $table->string('tgl_sk_pendirian')->length(15)->nullable();
            $table->string('sk_operasional')->length(100)->nullable();
            $table->string('tgl_sk_operasional')->length(15)->nullable();
            $table->string('status')->length(10)->nullable();
            $table->string('alamat_jalan')->length(250)->nullable();
            $table->string('alamat_rt')->length(10)->nullable();
            $table->string('alamat_rw')->length(10)->nullable();
            $table->string('alamat_dusun')->length(250)->nullable();
            $table->string('alamat_kelurahan')->length(250)->nullable();
            $table->string('alamat_kode_pos')->length(10)->nullable();
            $table->char('kota_id', 10)->nullable();
            $table->string('nama_kota')->length(50)->nullable();
            $table->char('provinsi_id', 10)->nullable();
            $table->string('provinsi_nama')->length(50)->nullable();
            $table->string('telepon')->length(20)->nullable();
            $table->string('faksimile')->length(20)->nullable();
            $table->string('website')->length(100)->nullable();
            $table->string('email')->length(100)->nullable();
            $table->char('status_milik_id',10)->nullable();
            $table->string('status_milik_nama')->length(100)->nullable();
            $table->char('pembina_id')->length(36)->nullable();
            $table->string('pembina_nama')->length(100)->nullable();
            $table->char('bentuk_pendidikan_id', 10)->nullable();
            $table->string('bentuk_pendidikan_nama')->length(100)->nullable();
            $table->string('last_update')->length(20)->nullable();
            $table->primary('id');
            $table->timestamps();
        });
    }
}
