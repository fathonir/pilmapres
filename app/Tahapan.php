<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 */
class Tahapan extends Model
{
    const BABAK_PENYISIHAN_1 = 1;
    const BABAK_PENYISIHAN_2 = 2;
    const BABAK_FINAL = 3;

    public function pesertas()
    {
        return $this->belongsToMany(Peserta::class, 'tahapan_pesertas');
    }
}
