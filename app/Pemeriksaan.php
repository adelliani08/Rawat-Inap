<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_pemeriksaan';
}
