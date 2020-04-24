<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaPtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_pts', function (Blueprint $table) {
            $table->char('id_reg_pd')->length(36);
            $table->char('id_pd')->length(36);
            $table->string('nim')->nullable();
            $table->char('kode_pt', 20)->default(0)->nullable();
            $table->string('nama_pt')->length(128)->nullable();
            $table->string('status_pt')->length(20)->nullable();
            $table->char('kode_prodi', 20)->default(0)->nullable();
            $table->string('nama_prodi')->length(128)->nullable();
            $table->char('id_sp')->length(36)->nullable();
            $table->integer('id_jns_daftar')->length(2)->unsigned()->nullable();
            $table->string('nama_jns_daftar')->length(100)->nullable();
            $table->integer('id_jenjang_didik')->length(3)->unsigned()->nullable();
            $table->string('nama_jenjang_didik')->length(100)->nullable();
            $table->string('nipd')->length(18)->nullable();
            $table->date('tgl_masuk_sp');
            $table->char('id_jns_keluar')->length(2)->nullable();
            $table->string('ket_jns_keluar')->length(100)->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->string('ket')->length(128)->nullable();
            $table->char('skhun')->length(20)->nullable();
            $table->integer('a_pernah_paud')->length(1)->unsigned()->nullable();
            $table->integer('a_pernah_tk')->length(1)->unsigned()->nullable();
            $table->string('smt_tempuh')->length(5)->nullable();
            $table->string('mulai_smt')->length(5)->nullable();
            $table->string('status')->length(5)->nullable();
            $table->integer('sks_diakui')->length(3)->unsigned()->nullable();
            $table->integer('jalur_skripsi')->length(1)->nullable();
            $table->string('judul_skripsi')->length(250)->nullable();
            $table->date('bln_awal_bimbingan')->nullable();
            $table->date('bln_akhir_bimbingan')->nullable();
            $table->string('sk_yudisium')->length(30)->nullable();
            $table->string('ipk')->nullable();
            $table->string('no_seri_ijazah')->length(40)->nullable();
            $table->string('sert_prof')->length(40)->nullable();
            $table->integer('a_pindah_mhs_asing')->length(1)->nullable();
            $table->string('nm_pt_asal')->length(50)->nullable();
            $table->string('nm_prodi_asal')->length(50)->nullable();
            $table->string('last_update')->length(15)->nullable();
            $table->timestamps();
            $table->primary('id_reg_pd');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mahasiswa_pts');
    }
}