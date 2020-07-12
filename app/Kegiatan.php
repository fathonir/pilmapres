<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property bool $is_aktif
 * @property string $tgl_awal_upload
 * @property string $tgl_akhir_upload
 * @property int $batas_umur
 * @property string $tgl_batas_umur
 * @property float $batas_ipk
 * @property int $batas_semester
 */
class Kegiatan extends Model
{
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
