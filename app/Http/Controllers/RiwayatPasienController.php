<?php

namespace App\Http\Controllers;

use App\RawatInap;
use Auth;
use Closure;
use Illuminate\Http\Request;

class RiwayatPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $id_dokter = Auth::user()->dokter->id_dokter;

        $rawat_inaps = RawatInap::selesai()->where("id_dokter",$id_dokter)->get();
        return view('dokter.riwayatpasien.index', [
            'rawat_inaps' => $rawat_inaps
        ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RawatInap  $rawatInap
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RawatInap $rawatInap)
    {
            return view('dokter.riwayatpasien.show', ["rawat_inap" => $rawatInap]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RawatInap  $rawatInap
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawatInap $rawatInap)
    {
        //
    }
}
