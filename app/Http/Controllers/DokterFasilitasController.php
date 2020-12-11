<?php

namespace App\Http\Controllers;

use App\RawatInap;
use Illuminate\Http\Request;

class DokterFasilitasController extends Controller
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
        return view("dokter.fasilitas", ["rawat_inap" => $rawatInap]);
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
            "tgl_pemakaian" => "required|date",
            "id_fasilitas" => "required|integer",
            "alasan_pemakaian" => "required|string",   
        ], [
            "tgl_pemakaian.required" => "Waktu Pemakaian tidak boleh kosong", 
            "tgl_pemakaian.date" => "Waktu Pemakaian harus berupa date",
            "id_fasilitas.required" => "Nama Fasilitas tidak boleh kosong",
            "id_fasilitas.integer" => "Nama Fasilitas harus berupa integer",
            "alasan_pemakaian.required" => "Alasan Pemakaian tidak boleh kosong",
            "alasan_pemakaian.string" => "Alasan Pemakaian harus berupa string",
        ]);

        $data_detailpf = $request->only(['tgl_pemakaian', 'alasan_pemakaian']);
        $rawatInap->fasilitas()->attach($request->input("id_fasilitas"), $data_detailpf);

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
