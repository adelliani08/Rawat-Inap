<?php

namespace App\Http\Controllers;

use App\RawatInap;
use Illuminate\Http\Request;

class DokterDiagnosaController extends Controller
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
        return view("dokter.diagnosa", ["rawat_inap" => $rawatInap]);
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
            "waktu_diagnosa" => "required|date",
            "hasil_diagnosa" => "required|string",
            "tinggi" => "required|string",   
            "berat" => "required|string",
            "suhubadan" => "required|string",   
        ], [
            "waktu_diagnosa.required" => "Waktu Diagnosa tidak boleh kosong", 
            "waktu_diagnosa.date" => "Waktu Diagnosa harus berupa date",
            "tinggi.required" => "Tinggi tidak boleh kosong",
            "tinggi.string" => "Tinggi harus berupa string",
            "berat.required" => "Berat tidak boleh kosong",
            "berat.string" => "Berat harus berupa string",
            "suhubadan.required" => "Suhu Badan tidak boleh kosong",
            "suhubadan.string" => "Suhu Badan harus berupa string",
            "hasil_diagnosa.required" => "Hasil Diagnosa tidak boleh kosong",
            "hasil_diagnosa.string" => "Hasil Diagnosa harus berupa string",
        ]);

        $data_diagnosa = $request->only(['waktu_diagnosa', 'hasil_diagnosa', 'tinggi', 'berat', 'suhubadan']);

        $rawatInap->diagnosa()->create($data_diagnosa);
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
