<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fasilitas extends Model
{
    use SoftDeletes;
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_fasilitas';
}
