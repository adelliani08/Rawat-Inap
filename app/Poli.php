<?php

namespace App;

use Carbon\Carbon;
use Hash;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    public $primaryKey = "id_poli";
    public $timestamps = false;
    protected $guarded = [];


    public function akun()
    {
        return $this->belongsTo("App\User", "id_user", "id_user");
    }

    public function rawatInap()
    {
        return $this->hasMany("App\RawatInap", "id_poli", "id_poli");
    }

    public function perawat()
    {
        return $this->hasMany("App\Perawat", "id_poli", "id_poli");
    }

    public function pegawai()
    {
        return $this->hasMany("App\Pegawai", "id_poli", "id_poli");
    }

    public function dokter()
    {
        return $this->hasMany("App\Dokter", "id_poli", "id_poli");
    }
    public function shift()
    {
        return $this->hasMany("App\Shift", "id_poli", "id_poli");
    }

    public function gedung()
    {
        return $this->hasMany("App\Gedung", "id_poli", "id_poli");
    }
    public function fasilitas()
    {
        return $this->hasMany("App\Fasilitas", "id_poli", "id_poli");
    }
}
