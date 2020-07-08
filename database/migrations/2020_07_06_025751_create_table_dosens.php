<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDosens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nidn', 30);
            $table->text('nama');
            $table->text('gelar_depan')->nullable();
            $table->text('gelar_belakang')->nullable();
            $table->unsignedInteger('perguruan_tinggi_id')->nullable();
            $table->unsignedInteger('program_studi_id')->nullable();
            $table->string('id_pdpt', 36)->nullable();
            $table->timestamps();
            $table->foreign('perguruan_tinggi_id')->references('id')->on('perguruan_tinggis');
            $table->foreign('program_studi_id')->references('id')->on('program_studis');
            $table->unique('nidn');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('dosen_id')->nullable()->after('mahasiswa_id');
            $table->foreign('dosen_id')->references('id')->on('dosens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_dosen_id_foreign');
            $table->dropColumn('dosen_id');
        });

        Schema::dropIfExists('dosens');
    }
}
