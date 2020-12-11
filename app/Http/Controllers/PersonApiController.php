<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dokter;
use App\Poli;

class PersonApiController extends Controller
{
    function getDokter(Request $request)
    {
        if ($request->has('term')) {

            $dokter = Dokter::where("id_poli", $request->input("poli"))->where("nama_dokter", "like", "%" . $request->input("term") . "%")->get();
        } else {
            $dokter = Dokter::where("id_poli", $request->input("poli"))->get();
        }
        return response()->json($dokter);
    }
}
