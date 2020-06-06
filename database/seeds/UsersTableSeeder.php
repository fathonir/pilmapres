<?php

use App\Group;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group  = Group::where('name', 'Admin Master')->first();
        $user_admin = new User();
        $user_admin->name = 'Admin Master';
        $user_admin->email = 'admin.pilmapres@kemdikbud.go.id';
        $user_admin->password = Hash::make('password');
        $user_admin->active = 1;
        $user_admin->is_user_request = 0;
        $user_admin->is_user_rejected = 0;
        $user_admin->save();
        $user_admin->groups()->attach($group);
    }
}
