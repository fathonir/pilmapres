<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokSkor extends Model
{
    public function skors()
    {
        return $this->hasMany(Skor::class);
    }
}
