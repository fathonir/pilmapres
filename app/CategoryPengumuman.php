<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPengumuman extends Model
{
    protected $table = 'category_pengumuman';

    protected $fillable = [
        'nama', 
    ];

    public function categoryPengumuman()
    {
        return $this->hasMany(Pengumuman::class,'category_pengumuman_id');
    }
}
