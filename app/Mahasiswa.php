<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Enable Mass Assignment
	protected $guarded = [];
    
    public function perguruanTinggi()
    {
        return $this->belongsTo('App\PerguruanTinggi');
    }
    
    public function programStudi()
    {
        return $this->belongsTo('App\ProgramStudi');
    }
}