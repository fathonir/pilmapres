<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'judul', 'deskripsi', 'user_id', 'gambar', 'file', 'viewers'
    ];
}
