<?php

namespace App\Http\Controllers;

use App\RawatInap;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class DokterPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_dokter = Auth::user()->dokter->id_dokter;
        $rawat_inap = RawatInap::belumSelesai()->where("id_dokter",$id_dokter)->get();

        return view("dokter.index", ["rawat_inaps" => $rawat_inap]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RawatInap  $rawatInap
     * @return \Illuminate\Http\Response
     */
    public function show(RawatInap $rawatInap)
    {

        if ($rawatInap->waktu_keluar) {
            return abort(404);
        } else {
            return view("dokter.show", ["rawat_inap" => $rawatInap]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RawatInap  $rawatInap
     * @return \Illuminate\Http\Response
     */
    public function edit(RawatInap $rawatInap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RawatInap  $rawatInap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RawatInap $rawatInap)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RawatInap  $rawatInap
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawatInap $rawatInap)
    {
        $rawatInap->siap_pulang = true;
        $rawatInap->save();
        return redirect()->route("pasien.index");
    }
}
