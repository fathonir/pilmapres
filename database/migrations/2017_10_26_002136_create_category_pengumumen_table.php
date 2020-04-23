<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPengumumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_pengumuman', function (Blueprint $table) {
            $table->increments('id');
            $table->text('judul');
            $table->string('file')->nullable();
            $table->integer('category_pengumuman_id')->unsigned();
            $table->foreign('category_pengumuman_id')->references('id')->on('category_pengumuman');
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
        Schema::dropIfExists('list_pengumuman');
    }
}
