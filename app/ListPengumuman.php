<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListPengumuman extends Model
{
    protected $table = 'list_pengumuman';

    protected $fillable = [
        'judul', 'gambar', 'deskripsi', 'file'
    ];

    public function pengumuman()
    {
        return $this->belongsTo(CategoryPengumuman::class);
    }
}
