<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PindahKamar;
use App\RawatInap;
use DB;

class PindahKamarController extends Controller
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
        return view("pelayanan.main.pindahkamar", ["rawat_inap" => $rawatInap]);
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
            "tgl_masuk" => "required|date", 
            "no_tempattidur" => "required|integer",
            "id_gedung" => "required|integer",
            "id_ruang" => "required|integer",
            "id_kamar" => "required|integer",
        ], [
            "tgl_masuk.required" => "Tanggal Masuk tidak boleh kosong", 
            "tgl_masuk.date" => "Tanggal Masuk harus berupa date",
            "no_tempattidur.required" => "No Tempat Tidur tidak boleh kosong",
            "no_tempattidur.integer" => "No Tempat Tidur harus berupa integer",
            "id_gedung.required" => "Nama Gedung tidak boleh kosong",
            "id_gedung.integer" => "Nama Gedung harus berupa integer",
            "id_ruang.required" => "Nama Ruang tidak boleh kosong",
            "id_ruang.integer" => "Nama Ruang harus berupa integer",
            "id_kamar.required" => "Nama Kamar tidak boleh kosong",
            "id_kamar.integer" => "Nama Kamar harus berupa integer",
        ]);

        if ($rawatInap->tgl_keluar) {
            return abort(404);
        }

        $data_kamar = $request->only(["tgl_masuk", "id_kamar", "no_tempattidur"]);
        $rawatInap->kamars()->whereNull("tgl_keluar")->update(["tgl_keluar" => $data_kamar["tgl_masuk"],"kasur_terisi"=>DB::raw("kasur_terisi-1")]);
        $rawatInap->kamars()->attach($data_kamar["id_kamar"], $data_kamar);
        return redirect()->route("pelayanan.index");
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
