<?php

namespace App\Http\Controllers;

use App\Gedung;
use Auth;
use Hash;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_poli = Auth::user()->poli->id_poli;

        $gedungs = Gedung::where("id_poli", $id_poli)->orderBy("nama_gedung")->get();
        return view("admin.ruangan.gedung.index", ["gedungs" => $gedungs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can("create", Gedung::class)) {
            return view("admin.ruangan.gedung.form");
        } else {
            return back();
        }
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
            "nama_gedung" => "required|string", 
        ], [
            "nama_gedung.required" => "Nama Gedung tidak boleh kosong", 
            "nama_gedung.string" => "Nama Gedung harus berupa string",
        ]);

        if (Auth::user()->can("create", Gedung::class)) {
            $id_poli = Auth::user()->poli->id_poli;
            $data_gedung = $request->only(["nama_gedung"]);
            $data_gedung["id_poli"] = $id_poli;

            Gedung::create($data_gedung);

            return redirect()->route("gedung.index");
        } {
            return redirect()->route("gedung.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function show(Gedung $gedung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function edit(Gedung $gedung)
    {
        return view("admin.ruangan.gedung.edit", ["gedung" => $gedung]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gedung $gedung)
    {
        $request->validate([
            "nama_gedung" => "required|string", 
        ], [
            "nama_gedung.required" => "Nama Gedung tidak boleh kosong", 
            "nama_gedung.string" => "Nama Gedung harus berupa string",
        ]);

        if (Auth::user()->can("update", $gedung)) {
            $gedung->nama_gedung = $request->input("nama_gedung");
            $gedung->save();
            return redirect()->route("gedung.index");
        } else {
            return redirect()->route("gedung.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gedung $gedung)
    {
        if (Auth::user()->can("delete", $gedung)) {

            $gedung->delete();
            return redirect()->route("gedung.index");
        } else {
            return redirect()->route("gedung.index");
        }
    }
}
