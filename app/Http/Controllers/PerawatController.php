<?php

namespace App\Http\Controllers;

use App\Perawat;
use Auth;
use Hash;
use Illuminate\Http\Request;

class PerawatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_poli = Auth::user()->poli->id_poli;
        $perawats = Perawat::where("id_poli", $id_poli)->orderBy("nama_perawat")->get();
        return view("admin.perawat.index", ["perawats" => $perawats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_poli = Auth::user()->poli->id_poli;
        return view("admin.perawat.form", ["id_poli" => $id_poli]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama_perawat" => "required|string", 
            "jenis_kelamin" => "required|in:Laki-laki,Perempuan",
            "notelp" => "required|string",
            "alamat" => "required|string",
            "id_shift" => "required|integer",
        ], [
            "nama_perawat.required" => "Nama Perawat tidak boleh kosong", 
            "nama_perawat.string" => "Nama Perawat harus berupa string",
            "jenis_kelamin.required" => "Jenis Kelamin tidak boleh kosong",
            "jenis_kelamin.in" => "Jenis Kelamin harus berupa enum",
            "notelp.required" => "No. HP tidak boleh kosong",
            "notelp.string" => "No. HP harus berupa string",
            "alamat.required" => "Alamat tidak boleh kosong",
            "alamat.string" => "Alamat Fasilitas harus berupa string",
            "id_shift.required" => "Shift tidak boleh kosong", 
            "id_shift.integer" => "Shift harus berupa integer",
        ]);

        $id_poli = Auth::user()->poli->id_poli;

        $data_perawat = $request->only([
            "nama_perawat",
            "jenis_kelamin",
            "notelp",
            "alamat",

            "id_shift",
        ]);

        $data_perawat["id_poli"] = $id_poli;

        Perawat::create($data_perawat);
        return redirect()->route("perawat.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perawat  $perawat
     * @return \Illuminate\Http\Response
     */
    public function show(Perawat $perawat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perawat  $perawat
     * @return \Illuminate\Http\Response
     */
    public function edit(Perawat $perawat)
    {
        $id_poli = Auth::user()->poli->id_poli;
        return view("admin.perawat.edit", ["perawat" => $perawat, "id_poli" => $id_poli]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perawat  $perawat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perawat $perawat)
    {
        $request->validate([
            "nama_perawat" => "required|string", 
            "jenis_kelamin" => "required|in:Laki-laki,Perempuan",
            "id_shift" => "required|integer",
            "notelp" => "required|string",
            "alamat" => "required|string",
        ], [
            "nama_perawat.required" => "Nama Perawat tidak boleh kosong", 
            "nama_perawat.string" => "Nama Perawat harus berupa string",
            "jenis_kelamin.required" => "Jenis Kelamin tidak boleh kosong",
            "jenis_kelamin.in" => "Jenis Kelamin harus berupa enum",
            "id_shift.required" => "Shift tidak boleh kosong", 
            "id_shift.integer" => "Shift harus berupa integer",
            "notelp.required" => "No. Telepon tidak boleh kosong",
            "notelp.string" => "No. Telepon harus berupa string",
            "alamat.required" => "Alamat tidak boleh kosong",
            "alamat.string" => "Alamat Fasilitas harus berupa string",
        ]);

        $perawat->nama_perawat = $request->input("nama_perawat");
        $perawat->jenis_kelamin = $request->input("jenis_kelamin");
        $perawat->notelp = $request->input("notelp");
        $perawat->alamat = $request->input("alamat");
        $perawat->id_shift = $request->input("id_shift");

        $perawat->save();
        return redirect()->route("perawat.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perawat  $perawat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perawat $perawat)
    {
        $perawat->delete();
        return redirect()->route("perawat.index");
    }
}
