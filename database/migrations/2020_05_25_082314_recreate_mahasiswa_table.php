<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('mahasiswa_pts');
        Schema::dropIfExists('mahasiswas');
        
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('perguruan_tinggi_id');
            $table->text('nim');
            $table->text('nama');
            $table->date('tgl_lahir')->nullable();
            $table->text('tempat_lahir')->nullable();
            $table->unsignedInteger('program_studi_id');
            $table->unsignedSmallInteger('angkatan');
            $table->text('email')->nullable();
            $table->text('no_hp')->nullable();
            $table->char('id_pdpt', 36);
            $table->timestamps();
            $table->foreign('perguruan_tinggi_id')->references('id')->on('perguruan_tinggis');
            $table->foreign('program_studi_id')->references('id')->on('program_studis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
        
        //
        // database/migrations/2017_01_21_075700_create_mahasiswa_table.php
        //
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->char('id_pd')->length(36);
            $table->string('nm_pd',50);
            $table->char('jk',1)->nullable();
            $table->char('nisn',10)->nullable();
            $table->char('nik',16)->nullable();
            $table->string('tmpt_lahir',20)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->integer('id_agama')->length(16)->unsigned()->nullable();
            $table->string('nama_agama')->nullable();
            $table->integer('id_kk')->length(32)->unsigned()->nullable();
            $table->char('id_sp',36)->nullable();
            $table->string('jln',80)->nullable();
            $table->integer('rt')->length(2)->unsigned()->nullable();
            $table->integer('rw')->length(2)->unsigned()->nullable();
            $table->string('nm_dsn',40)->nullable();
            $table->string('ds_kel',40)->nullable();
            $table->char('id_wil',8)->nullable();
            $table->string('nama_wil')->nullable();
            $table->char('kode_pos',5)->nullable();
            $table->integer('id_jns_tinggal')->length(2)->unsigned()->nullable();
            $table->string('nama_jns_tinggal')->nullable();
            $table->integer('id_alat_transprot')->length(2)->unsigned()->nullable();
            $table->string('telepon_rumah',20)->nullable();
            $table->string('telepon_seluler',20)->nullable();
            $table->string('email',50)->nullable();
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

        //
        // database/migrations/2017_02_12_103917_create_mahasiswa_pts_table.php
        //
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
            $table->string('tgl_sk_yudisium')->length(30)->nullable();
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
}
