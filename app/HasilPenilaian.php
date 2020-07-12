<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int skor_id
 * @property float skor
 * @property float nilai
 * @property string komentar
 * @property FilePeserta $filePeserta
 */
class HasilPenilaian extends Model
{
    protected $guarded = [];

    public function plotReviewer()
    {
        return $this->belongsTo(PlotReviewer::class);
    }

    public function filePeserta()
    {
        return $this->belongsTo(FilePeserta::class);
    }
}
