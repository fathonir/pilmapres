<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property Mahasiswa $mahasiswa
 * @property Kegiatan $kegiatan
 * @property int $semester_tempuh
 * @property float $ipk
 * @property FilePengantarPeserta $filePengantarPeserta
 * @property int mahasiswa_id
 * @property bool is_approved
 * @property int approved_by
 * @property string approved_at
 * @property bool is_rejected
 * @property int rejected_by
 * @property string rejected_at
 * @property string keterangan_reject
 * @property int kegiatan_id
 */
class Peserta extends Model
{
    protected $guarderd = [];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa');
    }

    public function kegiatan()
    {
        return $this->belongsTo('App\Kegiatan');
    }

    public function filePengantarPeserta()
    {
        return $this->hasOne('App\FilePengantarPeserta');
    }
}
