<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryGallerie extends Model
{

	protected $primaryKey = 'id_category_galleries';
	
    protected $fillable = [
        'id_category_galleries', 'judul', 'deskripsi' 
    ];

}    