<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->char('id_pd')->length(36);
            $table->string('nm_pd',50);
            $table->char('jk',1)->nullable();
            $table->char('nisn',10)->nullable();
            $table->char('nik',16);
            $table->string('tmpt_lahir',20)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->integer('id_agama')->length(16)->unsigned()->nullable();
            $table->integer('id_kk')->length(32)->unsigned()->nullable();
            $table->char('id_sp',36)->nullable();
            $table->string('jln',80)->nullable();
            $table->integer('rt')->length(2)->unsigned()->nullable();
            $table->integer('rw')->length(2)->unsigned()->nullable();
            $table->string('nm_dsn',40)->nullable();
            $table->string('ds_kel',40)->nullable();
            $table->char('id_wil',8)->nullable();
            $table->char('kode_pos',5)->nullable();
            $table->integer('id_jns_tinggal')->length(2)->unsigned()->nullable();
            $table->integer('id_alat_transprot')->length(2)->unsigned()->nullable();
            $table->string('telepon_rumah',20)->nullable();
            $table->string('telepon_seluler',20);
            $table->string('email',50);
            $table->integer('a_terima_kps')->length(1)->unsigned()->nullable();
            $table->integer('wna')->length(1)->unsigned()->nullable();
            $table->string('no_kps',40)->nullable();
            $table->char('stat_pd',1)->nullable();
            $table->string('nm_ayah',50)->nullable();
            $table->string('nm_ibu_kandung',50)->nullable();
            $table->string('nm_wali',30)->nullable();
            $table->string('kewarganegaraan',100)->nullable();
            $table->timestamps();
            $table->primary('id_pd');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mahasiswas');
    }
}
