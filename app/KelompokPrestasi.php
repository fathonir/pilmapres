<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokPrestasi extends Model
{
    protected $guarded = [];

    public function jenisPrestasis()
    {
        return $this->hasMany(JenisPrestasi::class);
    }
}
