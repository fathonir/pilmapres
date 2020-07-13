<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KaryaTulis extends Model
{
    public function topik()
    {
        return $this->belongsTo(Topik::class, 'topik_id', 'id');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id', 'id');
    }
}
