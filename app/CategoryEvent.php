<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryEvent extends Model
{
    protected $primaryKey = 'id_category_event';
	
    protected $fillable = [
        'id_category_event', 'judul' 
    ];
}
