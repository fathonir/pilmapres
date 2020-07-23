<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string allowed_types
 * @property int id
 * @property int max_size
 */
class Syarat extends Model
{
    /**
     * @return float|int
     */
    public function getMaxSizeMbAttribute()
    {
        return $this->max_size / 1024;
    }
}
