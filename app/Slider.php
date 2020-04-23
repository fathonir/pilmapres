<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'user_id', 'judul', 'deskripsi', 'gambar',
    ];
}
