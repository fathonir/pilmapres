<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $primaryKey = 'id';

    protected $fillable = [
		'judul', 'deskripsi', 'user_id', 'id',
    ];
}
