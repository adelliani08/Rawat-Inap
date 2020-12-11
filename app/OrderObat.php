<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderObat extends Pivot
{
    public $timestamps=false;
    protected $guarded=[];
    protected $primaryKey = 'id_order';
    protected $table = "order_obats";

    public $incrementing = true;

    public function returobat()
    {
        return $this->hasOne("App\PengembalianObat", "id_order", "id_order");
    }

    public function obat()
    {
        return $this->belongsTo("App\Obat", "id_obat", "id_obat");
    }
}
