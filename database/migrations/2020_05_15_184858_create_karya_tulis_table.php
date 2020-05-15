<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryaTulisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karya_tulis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul')->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('topik_id')->unsigned()->nullable();
            $table->integer('bidang_id')->unsigned()->nullable();
            $table->string('file')->nullable();
            $table->text('ringkasan')->nullable();
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
        Schema::dropIfExists('karya_tulis');
    }
}
