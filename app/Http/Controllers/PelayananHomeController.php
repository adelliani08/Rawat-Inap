<?php

namespace App\Http\Controllers;

use App\Kamar;
use App\RawatInap;
use Illuminate\Http\Request;
use Auth;

class PelayananHomeController extends Controller
{
    public function __invoke()
    {
        $id_poli = Auth::user()->pegawai->id_poli;
        $kamars = Kamar::wherePoli($id_poli)->whereColumn("kasur_terisi", "<", "jumlah_kasur")->get();

        $rawat_inaps = RawatInap::with(["kamars" => function ($query) {
            $query->whereNull("tgl_keluar");
        }])->whereNull("tgl_keluar")->get();
        return view('pelayanan.main.index', [
            'id_poli' => $id_poli,
            'kamars' => $kamars,
            'rawat_inaps' => $rawat_inaps
        ]);
    }
}
