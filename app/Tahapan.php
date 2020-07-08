<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 */
class Tahapan extends Model
{
    public function pesertas()
    {
        return $this->belongsToMany(Peserta::class, 'tahapan_pesertas');
    }
}
