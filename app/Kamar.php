<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kamar extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'id_kamar';

    public function ruang()
    {
        return $this->belongsTo('App\Ruang', 'id_ruang', 'id_ruang');
    }

    public function rawatinap(){
        return $this->belongsToMany("App\Kamar","detail_p_k_s","id_rawatinap","id_kamar","id_rawatinap","id_kamar")->using('App\DetailPK')->withPivot(["tgl_masuk","tgl_keluar","no_tempattidur"]);
    }

    public static function wherePoli($id){
        return self::whereHas("ruang",function($queryRuang) use ($id){
            $queryRuang->whereHas("gedung",function($queryGedung) use ($id){
                $queryGedung->where("id_poli",$id);
            });
        });
    }
}
