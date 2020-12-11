<?php

namespace App\Http\Controllers;

use App\Shift;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_poli = Auth::user()->poli->id_poli;

        $shifts = Shift::where("id_poli", $id_poli)->get();
        return view("admin.shift.index", ["shifts" => $shifts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.shift.form");
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
            "nama_shift" => "required|string",
            "jam_masuk" => "required|date_format:H:i",
            "jam_keluar" => "required|date_format:H:i",   
        ], [
            "nama_shift.required" => "Nama Shift tidak boleh kosong", 
            "nama_shift.string" => "Nama Shift harus berupa string",
            "jam_masuk.required" => "Jam Masuk tidak boleh kosong", 
            "jam_masuk.date" => "Jam Masuk harus berupa date", 
            "jam_keluar.required" => "Jam Keluar tidak boleh kosong", 
            "jam_keluar.date" => "Jam Keluar harus berupa date",
            
        ]);


        $id_poli = Auth::user()->poli->id_poli;

        $data_shift = $request->only(["nama_shift", "jam_masuk", "jam_keluar"]);
        $data_shift["id_poli"] = $id_poli;
        Shift::create($data_shift);
        return redirect()->route("shift.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        return view("admin.shift.edit", ["shift" => $shift]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        $request->validate([
            "nama_shift" => "required|string",
            "jam_masuk" => "required|date_format:H:i",
            "jam_keluar" => "required|date_format:H:i",   
        ], [
            "nama_shift.required" => "Nama Shift tidak boleh kosong", 
            "nama_shift.string" => "Nama Shift harus berupa string",
            "jam_masuk.required" => "Jam Masuk tidak boleh kosong", 
            "jam_masuk.date" => "Jam Masuk harus berupa date", 
            "jam_keluar.required" => "Jam Keluar tidak boleh kosong", 
            "jam_keluar.date" => "Jam Keluar harus berupa date",
            
        ]);

        $shift->nama_shift = $request->input("nama_shift");
        $shift->jam_masuk = $request->input("jam_masuk");
        $shift->jam_keluar = $request->input("jam_keluar");

        $shift->save();
        return redirect()->route("shift.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        $shift->delete();
        return redirect()->route("shift.index");
    }
}
