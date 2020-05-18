<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KaryaTulis extends Model
{
  public function topik()
  {
    return $this->belongsTo('App\Topik', 'topik_id', 'id');
  }

  public function bidang()
  {
    return $this->belongsTo('App\Bidang', 'bidang_id', 'id');
  }
}
