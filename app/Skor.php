<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    public function kelompokSkor()
    {
        return $this->belongsTo(KelompokSkor::class);
    }
}
