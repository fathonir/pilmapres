<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public const ADMIN = 1;
    public const MAHASISWA = 2;
    public const JURI = 3;

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_groups', 'group_id', 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'group_roles', 'group_id', 'role_id');
    }

    public function userGroup()
    {
        return $this->hasMany(UserGroup::class, 'group_id');
    }

    public function groupRole()
    {
        return $this->hasMany(GroupRole::class, 'group_id');
    }
}
