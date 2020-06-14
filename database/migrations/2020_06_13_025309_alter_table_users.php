<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 100)->after('name');
            $table->unique('username'); // index name : users_username_unique
            $table->string('password_plain', 20)->after('password');
            $table->boolean('active')->change();
            $table->renameColumn('active', 'is_active');
            $table->dropColumn('is_user_request');
            $table->dropColumn('is_user_rejected');
        });

        // Update Admin
        DB::table('users')
            ->where('email', 'admin.pilmapres@kemdikbud.go.id')
            ->update(['username' => 'admin']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_username_unique');
            $table->dropColumn('username');
            $table->dropColumn('password_plain');
            $table->renameColumn('is_active', 'active');
            $table->boolean('is_user_request');
            $table->boolean('is_user_rejected');
        });
    }
}
