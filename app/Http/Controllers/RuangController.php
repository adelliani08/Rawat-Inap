<?php

namespace App\Http\Controllers;

use App\Ruang;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_poli = Auth::user()->poli->id_poli;
        $ruangs = Ruang::whereHas("gedung", function (Builder $query) use ($id_poli) {
            $query->where("id_poli", $id_poli);
        })->orderBy("nama_ruang")->get();

        return view("admin.ruangan.ruang.index", ["ruangs" => $ruangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_poli = Auth::user()->poli->id_poli;

        return view("admin.ruangan.ruang.form", ["id_poli" => $id_poli]);
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
            "nama_ruang" => "required|string", 
            "id_gedung" => "required|integer",
        ], [
            "nama_ruang.required" => "Nama Ruang tidak boleh kosong", 
            "nama_ruang.string" => "Nama Ruang harus berupa string",
            "id_gedung.required" => "Nama Gedung tidak boleh kosong", 
            "id_gedung.integer" => "Nama Gedung harus berupa string",
        ]);

        $data_ruang = $request->only(["nama_ruang", "id_gedung"]);
        Ruang::create($data_ruang);
        return redirect()->route("ruang.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function show(Ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruang $ruang)
    {
        $id_poli = Auth::user()->poli->id_poli;
        return view("admin.ruangan.ruang.edit", ["ruang" => $ruang, "id_poli" => $id_poli]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruang $ruang)
    {
        $request->validate([
            "nama_ruang" => "required|string", 
            "id_gedung" => "required|integer",
        ], [
            "nama_ruang.required" => "Nama Ruang tidak boleh kosong", 
            "nama_ruang.string" => "Nama Ruang harus berupa string",
            "id_gedung.required" => "Nama Gedung tidak boleh kosong", 
            "id_gedung.integer" => "Nama Gedung harus berupa integer",
        ]);

        $ruang->nama_ruang = $request->input("nama_ruang");
        $ruang->id_gedung = $request->input("id_gedung");

        $ruang->save();
        return redirect()->route("ruang.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruang $ruang)
    {
        $ruang->delete();
        return redirect()->route("ruang.index");
    }
}
