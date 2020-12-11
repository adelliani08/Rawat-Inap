<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_obat';
}
