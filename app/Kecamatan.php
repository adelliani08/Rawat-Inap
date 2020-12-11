<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_kec';
    
    public function kabupaten()
    {
    return $this->belongsTo('App\Kabupaten','id_kab','id_kab');
    }
}
