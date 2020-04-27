<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerguruanTinggi extends Model
{
	protected $casts = [
					    'id' => 'char'
					  ];
					  
    public function getPtAktif()
	  {
	    $pt_aktif = $this->select('id','nama')->where('kode', 'NOT LIKE', '9%')->get();
	    return $pt_aktif;
	  }
}
