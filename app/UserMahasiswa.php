<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMahasiswa extends Model
{
    protected $primaryKey = 'id_user_mahasiswa';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_pd');
    }
}
