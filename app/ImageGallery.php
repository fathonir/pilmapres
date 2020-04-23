<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $fillable = [
		'user_id', 'gallery_id', 'image'
    ];
}
