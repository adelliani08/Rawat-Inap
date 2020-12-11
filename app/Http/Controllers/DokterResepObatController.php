<?php

namespace App\Http\Controllers;

use App\RawatInap;
use Illuminate\Http\Request;

class DokterResepObatController extends Controller
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
    public function create(Request $request, RawatInap $rawatInap)
    {
        return view("dokter.resepobat", ["rawat_inap" => $rawatInap]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RawatInap $rawatInap)
    {
        $request->validate([
            "waktu_order" => "required|date",
            "id_obat" => "required|integer",
            "jumlah_order" => "required|string",
            "tujuan" => "required|string",   
        ], [
            "waktu_order.required" => "Waktu Resep tidak boleh kosong", 
            "waktu_order.date" => "Waktu Resep harus berupa date",
            "id_obat.required" => "Nama Obat tidak boleh kosong",
            "id_obat.integer" => "Nama Obat harus berupa integer",
            "jumlah_order.required" => "Jumlah Obat tidak boleh kosong",
            "jumlah_order.string" => "Jumlah Obat harus berupa string",
            "tujuan.required" => "Tujuan Obat tidak boleh kosong",
            "tujuan.string" => "Tujuan Obat Pemeriksaan harus berupa string",
        ]);

        $data_obat = $request->only(["waktu_order", "jumlah_order", "tujuan"]);
        $data_obat["efek"] = "";
        $rawatInap->obat()->attach($request->input("id_obat"), $data_obat);

        return redirect()->route("pasien.show", ['rawat_inap' => $rawatInap->id_rawatinap]);
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
