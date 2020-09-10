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
    const PRESENTASI_GAGASAN_KREATIF = 4;
    const WAWANCARA_KARYA_UNGGULAN = 5;
    const PRESENTASI_BAHASA_INGGRIS = 6;

    public function pesertas()
    {
        return $this->belongsToMany(Peserta::class, 'tahapan_pesertas');
    }
}
