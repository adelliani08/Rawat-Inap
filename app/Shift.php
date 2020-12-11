<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'id_shift';

    function pegawai()
    {
        return $this->hasMany("App\Pegawai", "id_shift", "id_shift");
    }
    function perawat()
    {
        return $this->hasMany("App\Perawat", "id_shift", "id_shift");
    }
}
