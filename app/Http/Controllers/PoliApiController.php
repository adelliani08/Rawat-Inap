<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use Illuminate\Http\Request;

use App\Gedung;
use App\Poli;
use App\Kamar;
use App\Obat;
use App\Ruang;
use App\Shift;

class PoliApiController extends Controller
{
    function getPoli(Request $request)
    {
        if ($request->has("term")) {
            $poli = Poli::where("nama_poli", "like", "%" . $request->input("term") . "%")->get();
        } else {
            $poli = Poli::all();
        }
        return response()->json($poli);
    }

    function getKamarPoli(Request $request)
    {
        if ($request->input("poli",null)) {
            $kamar = Kamar::wherePoli($request->input("poli"))->with("ruang", "ruang.gedung")->get();
        } else {
            $kamar = [];
        }
        return response()->json($kamar);
    }

    function getGedung(Request $request)
    {

        if ($request->has("term")) {
            $gedung = Gedung::where("nama_gedung", "like", "%" . $request->input("term") . "%")->where("id_poli", $request->input("poli"))->get();
        } else {
            $gedung = Gedung::where("id_poli", $request->input("poli"))->get();
        }
        return response()->json($gedung);
    }
    function getRuangan(Request $request)
    {
        if ($request->has("term")) {
            $ruang = Ruang::where("nama_ruang", "like", "%" . $request->input("term") . "%")->where("id_gedung", $request->input("gedung"))->get();
        } else {
            $ruang = Ruang::where("id_gedung", $request->input("gedung"))->get();
        }
        return response()->json($ruang);
    }
    function getKamar(Request $request)
    {
        if ($request->has("term")) {
            $kamar = Kamar::where("nama_kamar", "like", "%" . $request->input("term") . "%")->where("id_ruang", $request->input("ruang"))->get();
        } else {
            $kamar = Kamar::where("id_ruang", $request->input("ruang"))->get();
        }
        return response()->json($kamar);
    }

    function getShift(Request $request)
    {
        return response()->json(Shift::where("id_poli", $request->input("poli"))->get());
    }

    function getObat(Request $request)
    {
        if ($request->has("term")) {
            $obat = Obat::where("nama_obat", "like", "%" . $request->input("term") . "%")->where("id_poli", $request->input("poli"))->get();
        } else {
            $obat = Obat::where("id_poli", $request->input("poli"))->get();
        }
        return response()->json($obat);
    }

    function getFasilitas(Request $request)
    {
        if ($request->has("term")) {
            $obat = Fasilitas::where("nama_fasilitas", "like", "%" . $request->input("term") . "%")->where("id_poli", $request->input("poli"))->get();
        } else {
            $obat = Fasilitas::where("id_poli", $request->input("poli"))->get();
        }
        return response()->json($obat);
    }
}
