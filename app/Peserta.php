<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property Mahasiswa $mahasiswa
 * @property Kegiatan $kegiatan
 * @property KelompokPeserta $kelompokPeserta
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
 * @property FilePeserta[] $filePesertas
 */
class Peserta extends Model
{
    protected $guarderd = [];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function kelompokPeserta()
    {
        return $this->belongsTo(KelompokPeserta::class);
    }

    public function filePengantarPeserta()
    {
        return $this->hasOne(FilePengantarPeserta::class);
    }

    public function filePesertas()
    {
        return $this->hasMany(FilePeserta::class);
    }

    public function tahapans()
    {
        return $this->belongsToMany(Tahapan::class, 'tahapan_pesertas');
    }

    public function isLolosTahap2()
    {
        return ($this->tahapans()->where(['tahapan_id' => Tahapan::BABAK_PENYISIHAN_2])->first() != null);
    }

    public function isLolosTahapFinal()
    {
        return ($this->tahapans()->where(['tahapan_id' => Tahapan::BABAK_FINAL])->first() != null);
    }

    /**
     * @param int $mahasiswa_id
     * @param int $kegiatan_id
     * @return Peserta
     */
    public static function getFromMahasiswa($mahasiswa_id, $kegiatan_id)
    {
        return self::where([
            'mahasiswa_id' => $mahasiswa_id,
            'kegiatan_id' => $kegiatan_id,
            'is_approved' => 1
        ])->first();
    }
}
