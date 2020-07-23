<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JadwalKegiatan
 * @package App
 * @property Kegiatan $kegiatan
 * @property Tahapan $tahapan
 */
class JadwalKegiatan extends Model
{
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function tahapan()
    {
        return $this->belongsTo(Tahapan::class);
    }
}
