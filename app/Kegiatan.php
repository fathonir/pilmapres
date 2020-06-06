<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $tgl_awal_upload
 * @property string $tgl_akhir_upload
 */
class Kegiatan extends Model
{
    public function program()
    {
        return $this->belongsTo('\App\Program');
    }
}
