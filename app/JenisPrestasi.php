<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPrestasi extends Model
{
    protected $guarded = [];

    public function kelompokPrestasi()
    {
        return $this->belongsTo(KelompokPrestasi::class);
    }
}
