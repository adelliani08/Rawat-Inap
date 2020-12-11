<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruang extends Model
{
    use SoftDeletes;
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_ruang';

    public function kamar()
    {
        return $this->hasMany('App\Kamar','id_ruang', "id_ruang");
    }
    public function gedung()
    {
        return $this->belongsTo('App\Gedung','id_gedung','id_gedung');
    } 
}
