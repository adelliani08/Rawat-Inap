<?php

namespace App\Http\Controllers;

use App\RawatInap;
use Closure;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $rawat_inaps = RawatInap::selesai()->get();
        return view('pelayanan.riwayat.index', [
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
        if ($rawatInap->tgl_keluar != null) {
            return view('pelayanan.riwayat.show', ["rawat_inap" => $rawatInap]);
        } else {
            return abort(403);
        }
    }

    public function laporan(Request $request, RawatInap $rawatInap)
    {
        if ($rawatInap->tgl_keluar) {
            return view("pelayanan.riwayat.laporan", ["rawat_inap" => $rawatInap]);
        } else {
            return abort(403);
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
