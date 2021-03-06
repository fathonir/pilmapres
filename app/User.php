<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 * @property string $name
 * @property string $email
 * @property string username
 * @property int $mahasiswa_id
 * @property bool is_mail_verified
 * @property string email_verified_at
 * @property bool is_active
 * @property string password_plain
 * @property string password
 * @property Mahasiswa $mahasiswa
 * @property Dosen $dosen
 */
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
        return $this->hasMany(UserGroup::class, 'user_id');
    }

    public function userHasGroup()
    {
        return $this->belongsTo(UserGroup::class, 'id', 'user_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_groups', 'user_id', 'group_id');
    }

    public function hasAnyRole($role)
    {
        if ($this->groups()
            ->join('group_roles', 'groups.id', '=', 'group_roles.group_id')
            ->join('roles', 'roles.id', '=', 'group_roles.role_id')
            ->where('roles.name', $role)->first()) {
            return true;
        } else {
            return false;
        }
    }

    public function hasUserGroup()
    {
        return $this->belongsTo(UserGroup::class, 'id', 'user_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
