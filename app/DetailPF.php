<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\Pivot;

class DetailPF extends Pivot
{
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_pf';
    public $incrementing = true;
    protected $table = "detail_p_f_s";


}
