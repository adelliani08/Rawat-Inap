<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Provinsi;
use App\Kabupaten;
use App\Desa;

class WilayahApiController extends Controller{

    function getDesa(Request $request){
        if ($request->has('term')) {
            $desa = Desa::where("id_kec", $request->input("kecamatan"))->where("nama_desa", "like", "%".$request->input("term") . "%")->get();
        } else {
            $desa = Desa::where("id_kec", $request->input("kecamatan"))->get();
        }
        return response()->json($desa);
    }
    function getKecamatan(Request $request)
    {
        if ($request->has('term')) {
            $kecamatan = Kecamatan::where("id_kab", $request->input("kabupaten"))->where("nama_kec", "like", "%".$request->input("term") . "%")->get();
            return response()->json($kecamatan);
        } else {
            $kecamatan = Kecamatan::where("id_kab", $request->input("kabupaten"))->get();
        }
        return response()->json($kecamatan);
    }
    function getKabupaten(Request $request)
    {
        if ($request->has('term')) {
            $kabupaten = Kabupaten::where("id_prov", $request->input("provinsi"))->where("nama_kab", "like", "%".$request->input("term") . "%")->get();
            return response()->json($kabupaten);
        } else {
            $kabupaten = Kabupaten::where("id_prov", $request->input("provinsi"))->get();
        }
        return response()->json($kabupaten);
    }
    function getProvinsi(Request $request)
    {
        if ($request->has('term')) {
            $provinsi = Provinsi::where("nama_prov", 'LIKE', "%" . $request->input("term") . "%")->get();
        } else {
            $provinsi = Provinsi::all();
        }

        return response()->json($provinsi);
    }
}
