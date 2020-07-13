<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul', 'isi_berita', 'user_id', 'gambar', 'file', 'viewers', 'category_berita_id'
    ];

    public function berita()
    {
        return $this->belongsTo(CategoryBerita::class);
    }
}
