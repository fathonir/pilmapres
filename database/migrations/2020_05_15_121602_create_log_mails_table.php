<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_mails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email_sender')->nullable();
            $table->string('email_reciever')->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('user_id')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_sent')->nullable();
            $table->datetime('send_date')->nullable();
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
        Schema::dropIfExists('log_mails');
    }
}
