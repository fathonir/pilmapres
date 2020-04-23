<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryBerita extends Model
{
    protected $fillable = [
        'nama', 'user_id',
    ];

    public function categoryBerita()
    {
        return $this->hasMany('App\Berita','category_berita_id');
    }
}
