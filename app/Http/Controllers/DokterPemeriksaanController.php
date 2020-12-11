<?php

namespace App\Http\Controllers;

use App\Pemeriksaan;
use App\RawatInap;
use Illuminate\Http\Request;

class DokterPemeriksaanController extends Controller
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
        return view("dokter.pemeriksaan", ["rawat_inap" => $rawatInap]);
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
            "waktu_pemeriksaan" => "required|date",
            "jenis_pemeriksaan" => "required|string",
            "hasil_pemeriksaan" => "required|string",   
        ], [
            "waktu_pemeriksaan.required" => "Waktu Pemeriksaan tidak boleh kosong", 
            "waktu_pemeriksaan.date" => "Waktu Pemeriksaan harus berupa date",
            "jenis_pemeriksaan.required" => "Jenis Pemeriksaan tidak boleh kosong",
            "jenis_pemeriksaan.string" => "Jenis Pemeriksaan harus berupa string",
            "hasil_pemeriksaan.required" => "Hasil Pemeriksaan tidak boleh kosong",
            "hasil_pemeriksaan.string" => "Hasil Pemeriksaan harus berupa string",
        ]);

        $data_pemeriksaan = $request->only(['waktu_pemeriksaan', 'jenis_pemeriksaan', 'hasil_pemeriksaan', 'id_rawatinap']);
        $pemeriksaan = new Pemeriksaan($data_pemeriksaan);
        $rawatInap->pemeriksaan()->save($pemeriksaan);
        return redirect()->route("pasien.show", ['rawat_inap' => $rawatInap->id_rawatinap]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dokter  $dokter
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
