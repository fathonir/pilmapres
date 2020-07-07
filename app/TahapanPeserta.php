<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahapanPeserta extends Model
{
    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function tahapan()
    {
        return $this->belongsTo(Tahapan::class);
    }
}
