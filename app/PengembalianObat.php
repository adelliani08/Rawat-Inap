<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengembalianObat extends Model
{
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_pengembalian';
}
