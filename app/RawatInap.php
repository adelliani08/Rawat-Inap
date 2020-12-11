<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Str;

class RawatInap extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id_rawatinap';
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($data) {
            $data->no_rawatinap = (string) Str::uuid();
        });
    }

    public static function selesai()
    {
        return self::whereNotNull("tgl_keluar");
    }

    public static function belumSelesai()
    {
        return self::where("siap_pulang", false);
    }

    

    public static function  createFull($data_pasien, $data_rawatinap, $data_diagnosa, $data_kamar)
    {
        $pasien = Pasien::firstOrNew(["no_identitas" => $data_pasien["no_identitas"]], $data_pasien);
        $pasien->save();

        $rawat_inap = $pasien->rawatinap()->create($data_rawatinap);
        $rawat_inap->diagnosa()->create($data_diagnosa);

        $rawat_inap->kamars()->attach($data_kamar["id_kamar"], $data_kamar);

        return $rawat_inap;
    }

    public function diagnosa()
    {
        return $this->hasMany("App\Diagnosa", "id_rawatinap", "id_rawatinap");
    }

    public function pemeriksaan()
    {
        return $this->hasMany("App\Pemeriksaan", "id_rawatinap", "id_rawatinap");
    }

    public function pasien()
    {
        return $this->belongsTo('App\Pasien', 'id_pasien', 'id_pasien');
    }

    public function kamars()
    {
        return $this
            ->belongsToMany("App\Kamar", "detail_p_k_s", "id_rawatinap", "id_kamar", "id_rawatinap", "id_kamar")
            ->using("App\DetailPK")
            ->withPivot(["tgl_masuk", "tgl_keluar", "no_tempattidur"]);
    }

    public function getKamarSekarangAttribute()
    {
        return $this->kamars()->wherePivot("tgl_keluar", "=")->first();
    }

    public function getUmurAttribute()
    {
        return Carbon::now()->diffInYears(Carbon::parse($this->pasien->tgl_lahir));
    }

    public function obat()
    {
        return $this->belongsToMany("App\Obat", "order_obats", "id_rawatinap", "id_obat", "id_rawatinap", "id_obat")->using("App\OrderObat")->withPivot(["id_order", "waktu_order", "jumlah_order", "tujuan", "efek"]);
    }

    public function fasilitas()
    {
        return $this
            ->belongsToMany("App\Fasilitas", "detail_p_f_s", "id_rawatinap", "id_fasilitas", "id_rawatinap", "id_fasilitas")
            ->using("App\DetailPF")
            ->withPivot(["tgl_pemakaian", "alasan_pemakaian"]);
    }

    public function dokter()
    {
        return $this->belongsTo('App\Dokter', 'id_dokter', 'id_dokter');
    }
}
