<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_roles', 'role_id', 'groups_id');
    }

    public function groupRole()
    {
        return $this->hasMany(GroupRole::class, 'role_id');
    }
}
