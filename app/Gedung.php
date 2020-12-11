<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gedung extends Model
{
    use SoftDeletes;
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_gedung';

    public function ruangan(){
        return $this->hasMany('App\Ruang','id_gedung', 'id_gedung');
    }
}
