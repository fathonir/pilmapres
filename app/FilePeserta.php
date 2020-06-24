<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilePeserta extends Model
{
    protected $guarded = [];

    public function jenisPrestasi()
    {
        return $this->belongsTo(JenisPrestasi::class);
    }

    public function tingkatPrestasi()
    {
        return $this->belongsTo(TingkatPrestasi::class);
    }
}
