<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mahasiswa
 * @package App
 * @property int id
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
 * @property User $user
 */
class Mahasiswa extends Model
{
    // Enable Mass Assignment
    protected $guarded = [];

    public function perguruanTinggi()
    {
        return $this->belongsTo(PerguruanTinggi::class);
    }

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function pesertas()
    {
        return $this->hasMany(Peserta::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getTglLahirFormatedAttribute()
    {
        return strftime('%d %B %Y', strtotime($this->tgl_lahir));
    }
}
