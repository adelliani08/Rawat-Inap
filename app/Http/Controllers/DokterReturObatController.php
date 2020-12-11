<?php

namespace App\Http\Controllers;

use App\OrderObat;
use App\RawatInap;
use Illuminate\Http\Request;

class DokterReturObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, RawatInap $rawatInap, OrderObat $obat)
    {
        return view("dokter.obat.returobat", ["rawat_inap" => $rawatInap, "order_obat" => $obat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RawatInap $rawatInap, OrderObat $obat)
    {
        $request->validate([
            "waktu_pengembalian" => "required|date",
            "jumlah_terpakai" => "required|integer",
            "alasan_pengembalian" => "required|string",   
        ], [
            "waktu_pengembalian.required" => "Waktu Pengembalian tidak boleh kosong", 
            "waktu_pengembalian.date" => "Waktu Pengembalian harus berupa date",
            "jumlah_terpakai.required" => "Jumlah Terpakai tidak boleh kosong",
            "jumlah_terpakai.integer" => "Jumlah Terpakai harus berupa integer",
            "alasan_pengembalian.required" => "Alasan Pengembalian tidak boleh kosong",
            "alasan_pengembalian.string" => "Alasan Pengembalian harus berupa string",
        ]);

        $data_returobat = $request->only(["waktu_pengembalian","jumlah_terpakai","alasan_pengembalian"]);
        $obat->returobat()->create($data_returobat);
        return redirect()->route("pasien.show",["rawatInap"=>$rawatInap->id_rawatinap]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
