<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FilePeserta
 * @property Peserta $peserta
 * @property HasilPenilaian[] $hasilPenilaians
 * @property bool is_dinilai
 * @property int $id
 * @property string $nama_file
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

    public function hasilPenilaians()
    {
        return $this->hasMany(HasilPenilaian::class);
    }
}
