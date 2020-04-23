<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
     protected $fillable = [
        'user_id', 'judul', 'deskripsi', 'file', 'id_category_event'
    ];
}
