<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMahasiswa extends Model
{
	protected $primaryKey = 'id_user_mahasiswa';

  public function mahasiswa()
  {
    return $this->belongsTo('App\Mahasiswa', 'id_pd');
  }
  public function mahasiswaPt()
  {
    return $this->belongsTo('App\MahasiswaPt', 'id_pd', 'id_pd');
  }
}
