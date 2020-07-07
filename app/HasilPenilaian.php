<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilPenilaian extends Model
{
    public function plotReviewer()
    {
        return $this->belongsTo(PlotReviewer::class);
    }

    public function filePeserta()
    {
        return $this->belongsTo(FilePeserta::class);
    }
}
