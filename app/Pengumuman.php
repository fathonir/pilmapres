<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $fillable = [
        'user_id', 'judul', 'deskripsi', 'file','kategori_pengumuman'
    ];
}
