<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
	protected $table = 'pengumuman';
    protected $fillable = [
        'user_id', 'judul', 'deskripsi', 'file','kategori_pengumuman'
    ];
}
