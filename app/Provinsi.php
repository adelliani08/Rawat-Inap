<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_prov';
}
