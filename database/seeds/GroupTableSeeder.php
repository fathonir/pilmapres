<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\Role;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_list_group  = Role::where('name', 'List Groups')->first();
        $role_create_group  = Role::where('name', 'Create Group')->first();
        $role_details_group  = Role::where('name', 'Details Group')->first();
        $role_edit_group  = Role::where('name', 'Edit Group')->first();
        $role_delete_group  = Role::where('name', 'Delete Group')->first();
        $role_search_group  = Role::where('name', 'Search Group')->first();

        $role_list_role  = Role::where('name', 'List Roles')->first();
        $role_create_role  = Role::where('name', 'Create Role')->first();
        $role_details_role  = Role::where('name', 'Details Role')->first();
        $role_edit_role  = Role::where('name', 'Edit Role')->first();
        $role_delete_role  = Role::where('name', 'Delete Role')->first();
        $role_search_role  = Role::where('name', 'Search Role')->first();

        $role_list_user_group  = Role::where('name', 'List User Groups')->first();
        $role_create_user_group  = Role::where('name', 'Create User Group')->first();
        $role_details_user_group  = Role::where('name', 'Details User Group')->first();
        $role_edit_user_group  = Role::where('name', 'Edit User Group')->first();
        $role_delete_user_group  = Role::where('name', 'Delete User Group')->first();
        $role_search_user_group  = Role::where('name', 'Search User Group')->first();

        $role_list_group_role  = Role::where('name', 'List Group Roles')->first();
        $role_create_group_role  = Role::where('name', 'Create Group Role')->first();
        $role_details_group_role  = Role::where('name', 'Details Group Role')->first();
        $role_edit_group_role  = Role::where('name', 'Edit Group Role')->first();
        $role_delete_group_role  = Role::where('name', 'Delete Group Role')->first();
        $role_search_group_role  = Role::where('name', 'Search Group Role')->first();

        //Slider
        $role_create_slider  = Role::where('name', 'Create Slider')->first();
        $role_edit_slider  = Role::where('name', 'Edit Slider')->first();
        $role_index_slider  = Role::where('name', 'Index Slider')->first();
        $role_show_slider  = Role::where('name', 'Show Slider')->first();

        /*Gallery*/
        $role_index_gallery  = Role::where('name', 'Index Gallery')->first();
        $role_create_gallery  = Role::where('name', 'Create Gallery')->first();
        $role_edit_gallery  = Role::where('name', 'Edit Gallery')->first();
        $role_show_gallery  = Role::where('name', 'Show Gallery')->first();

        /*Berita*/
        $role_index_berita  = Role::where('name', 'Index Berita')->first();
        $role_create_berita  = Role::where('name', 'Create Berita')->first();
        $role_edit_berita  = Role::where('name', 'Edit Berita')->first();
        $role_show_berita  = Role::where('name', 'Show Berita')->first();

        /*Pengumuman*/
        $role_index_pengumuman  = Role::where('name', 'Index Pengumuman')->first();
        $role_create_pengumuman  = Role::where('name', 'Create Pengumuman')->first();
        $role_edit_pengumuman  = Role::where('name', 'Edit Pengumuman')->first();
        $role_show_pengumuman  = Role::where('name', 'Show Pengumuman')->first();


    	$group = new Group();
        $group->name = 'Admin Master';
        $group->save();

        $group->roles()->attach($role_list_group);
        $group->roles()->attach($role_create_group);
        $group->roles()->attach($role_details_group);
        $group->roles()->attach($role_edit_group);
        $group->roles()->attach($role_delete_group);
        $group->roles()->attach($role_search_group);

        $group->roles()->attach($role_list_role);
        $group->roles()->attach($role_create_role);
        $group->roles()->attach($role_details_role);
        $group->roles()->attach($role_edit_role);
        $group->roles()->attach($role_delete_role);
        $group->roles()->attach($role_search_role);

        $group->roles()->attach($role_list_user_group);
        $group->roles()->attach($role_create_user_group);
        $group->roles()->attach($role_details_user_group);
        $group->roles()->attach($role_edit_user_group);
        $group->roles()->attach($role_delete_user_group);
        $group->roles()->attach($role_search_user_group);
        
        $group->roles()->attach($role_list_group_role);
        $group->roles()->attach($role_create_group_role);
        $group->roles()->attach($role_details_group_role);
        $group->roles()->attach($role_edit_group_role);
        $group->roles()->attach($role_delete_group_role);
        $group->roles()->attach($role_search_group_role);

        //Slider
        $group->roles()->attach($role_create_slider);
        $group->roles()->attach($role_edit_slider);
        $group->roles()->attach($role_index_slider);
        $group->roles()->attach($role_show_slider);

        /*Gallery*/
        $group->roles()->attach($role_index_gallery);
        $group->roles()->attach($role_create_gallery);
        $group->roles()->attach($role_edit_gallery);
        $group->roles()->attach($role_show_gallery);

        /*Berita*/
        $group->roles()->attach($role_index_berita);
        $group->roles()->attach($role_create_berita);
        $group->roles()->attach($role_edit_berita);
        $group->roles()->attach($role_show_berita);

        /*Pengumuman*/
        $group->roles()->attach($role_index_pengumuman);
        $group->roles()->attach($role_create_pengumuman);
        $group->roles()->attach($role_edit_pengumuman);
        $group->roles()->attach($role_show_pengumuman);

        
        $group = new Group();
        $group->name = 'Peserta';
        $group->save();

        $group = new Group();
        $group->name = 'Juri';
        $group->save();

        $group = new Group();
        $group->name = 'Kopertis';
        $group->save();

        $group = new Group();
        $group->name = 'PT';
        $group->save();
    }
}
