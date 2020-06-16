<?php

namespace App\Console\Commands;

use App\Group;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-admin-user {name} {username} {password} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tambah user admin ke aplikasi';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::beginTransaction();
        $user = new User();
        $user->name = $this->argument('name');
        $user->username = $this->argument('username');
        $user->password_plain = $this->argument('password');
        $user->password = Hash::make($user->password_plain);
        $user->email = $this->argument('email');
        $user->is_mail_verified = true;
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->is_active = true;
        $user->save();

        $adminGroup = Group::where('name', 'Admin Master')->first();
        $user->groups()->attach($adminGroup);
        DB::commit();

        $this->info("User {$user->username} berhasil ditambahkan dengan password {$user->password_plain}");
    }
}
