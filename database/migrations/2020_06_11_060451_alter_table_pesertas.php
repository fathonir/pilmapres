<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePesertas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesertas', function(Blueprint $table) {
            $table->renameColumn('user_id_approve', 'approved_by');
            $table->renameColumn('approve_at', 'approved_at');
            $table->renameColumn('user_id_reject', 'rejected_by');
            $table->renameColumn('reject_at', 'rejected_at');
            $table->text('keterangan_reject')->nullable()->after('reject_at');
            $table->unsignedTinyInteger('semester_tempuh')->after('mahasiswa_id')
                ->comment('Semester ditempuh waktu daftar');
            $table->float('ipk', 3, 2)->after('semester_tempuh')->comment('IPK Waktu daftar');
            $table->string('ip_address', 15)->nullable()->after('keterangan_reject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesertas', function(Blueprint $table) {
            $table->renameColumn('approved_by', 'user_id_approve');
            $table->renameColumn('approved_at', 'approve_at');
            $table->renameColumn('rejected_by', 'user_id_reject');
            $table->renameColumn('rejected_at', 'reject_at');
            $table->dropColumn('keterangan_reject');
            $table->dropColumn('semester_tempuh');
            $table->dropColumn('ip_address');
        });
    }
}
