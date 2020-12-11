<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'id_desa';

    public function kecamatan()
    {
        return $this->belongsTo('App\Kecamatan', 'id_kec', 'id_kec');
    }
}
