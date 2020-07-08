<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FilePeserta
 * @property Peserta $peserta
 * @property HasilPenilaian hasilPenilaian
 */
class FilePeserta extends Model
{
    protected $guarded = [];

    public function Peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function jenisPrestasi()
    {
        return $this->belongsTo(JenisPrestasi::class);
    }

    public function tingkatPrestasi()
    {
        return $this->belongsTo(TingkatPrestasi::class);
    }

    public function hasilPenilaian()
    {
        return $this->hasOne(HasilPenilaian::class);
    }
}
