<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mahasiswa
 * @package App
 * @property string nim
 * @property string $nama
 * @property string $email
 * @property PerguruanTinggi $perguruanTinggi
 * @property ProgramStudi $programStudi
 * @property string $tgl_lahir
 * @property int semester_terakhir
 * @property float ipk_terakhir
 * @property Peserta[] $pesertas
 * @property string id_pdpt
 */
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

    public function pesertas()
    {
        return $this->hasMany('App\Peserta');
    }
}