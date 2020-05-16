<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userGroup()
    {
        return $this->hasMany('App\UserGroup','user_id');
    }

    public function userHasGroup()
    {
        return $this->belongsTo('App\UserGroup', 'id', 'user_id');
    }
    
    public function groups()
    {
      return $this->belongsToMany('App\Group', 'user_groups', 'user_id', 'group_id');
    }
    
    public function hasAnyRole($role)
    {
      if($this->groups()->join('group_roles', 'groups.id', '=', 'group_roles.group_id')->join('roles', 'roles.id', '=', 'group_roles.role_id')->where('roles.name', $role)->first()){
        return true;
      }else{
        return false;
      }
    }

    public function userMahasiswa()
    {
      return $this->belongsTo('App\UserMahasiswa', 'id', 'users_id');
    }

    public function karyaTulis()
    {
      return $this->belongsTo('App\KaryaTulis', 'id', 'users_id');
    }
}
