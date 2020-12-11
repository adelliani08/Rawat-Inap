<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_kab';
    
    public function provinsi()
    {
    return $this->belongsTo('App\Provinsi','id_prov','id_prov');
    }
}
