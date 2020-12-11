<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_pegawai';

    public function shift()
    {
        return $this->belongsTo('App\Shift', 'id_shift', 'id_shift');
    }
}
