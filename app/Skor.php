<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property float skor
 */
class Skor extends Model
{
    public function kelompokSkor()
    {
        return $this->belongsTo(KelompokSkor::class);
    }
}
