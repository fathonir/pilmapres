<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlotReviewer
 * @package App
 * @property TahapanPeserta $tahapanPeserta
 * @property Dosen $dosen
 * @property HasilPenilaian[] $hasilPenilaians
 */
class PlotReviewer extends Model
{
    public function tahapanPeserta()
    {
        return $this->belongsTo(TahapanPeserta::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function hasilPenilaians()
    {
        return $this->hasMany(HasilPenilaian::class);
    }
}
