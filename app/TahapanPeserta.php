<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TahapanPeserta
 * @package App
 * @property Peserta $peserta
 * @property Tahapan $tahapan
 */
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
