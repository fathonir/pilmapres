<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
	protected $primaryKey = 'id_pd';
    protected $casts = [
	  'id_pd' => 'char'
	];
}