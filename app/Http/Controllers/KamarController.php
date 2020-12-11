<?php

namespace App\Http\Controllers;

use App\Kamar;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_poli = Auth::user()->poli->id_poli;

        $kamar = Kamar::whereHas("ruang", function (Builder $query) use ($id_poli) {
            $query->whereHas("gedung", function (Builder $queryRuang) use ($id_poli) {
                $queryRuang->where("id_poli", $id_poli);
            });
        })->orderBy("nama_kamar")->get();
        return view("admin.ruangan.kamar.index", ["kamars" => $kamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_poli = Auth::user()->poli->id_poli;

        return view("admin.ruangan.kamar.form", ["id_poli" => $id_poli]);
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
            "nama_kamar" => "required|string", 
            "kelas" => "required|in:VIP,IV,III,II,I",
            "fasilitas" => "required|string",
            "harga_kamar" => "required|string", 
            "jumlah_kasur" => "required|integer",
            "id_ruang" => "required|integer", 
            "id_gedung" => "required|integer",
        ], [
            "nama_kamar.required" => "Nama Kamar tidak boleh kosong", 
            "nama_kamar.string" => "Nama Kamar harus berupa string",
            "kelas.required" => "Kelas tidak boleh kosong", 
            "kelas.in" => "Kelas harus berupa enum",
            "fasilitas.required" => "Fasilitas tidak boleh kosong", 
            "fasilitas.string" => "Fasilitas harus berupa string",
            "harga_kamar.required" => "Harga Kamar tidak boleh kosong", 
            "harga_kamar.string" => "Harga Kamar harus berupa string",
            "jumlah_kasur.required" => "Jumlah Kasur tidak boleh kosong", 
            "jumlah_kasur.integer" => "Jumlah Kasur harus berupa integer",
            "id_ruang.required" => "Nama Ruang tidak boleh kosong", 
            "id_ruang.integer" => "Nama Ruang harus berupa integer",
            "id_gedung.required" => "Nama Gedung tidak boleh kosong", 
            "id_gedung.integer" => "Nama Gedung harus berupa integer",
        ]);

        $data_kamar = $request->only(["nama_kamar", "id_ruang", "kelas", "fasilitas", "harga_kamar", "jumlah_kasur"]);
        Kamar::create($data_kamar);
        return redirect()->route("kamar.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        $id_poli = Auth::user()->poli->id_poli;
        return view("admin.ruangan.kamar.edit", ["kamar" => $kamar, "id_poli" => $id_poli]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            "nama_kamar" => "required|string", 
            "kelas" => "required|in:VIP,IV,III,II,I",
            "fasilitas" => "required|string",
            "harga_kamar" => "required|string", 
            "jumlah_kasur" => "required|integer",
            "id_ruang" => "required|integer", 
            "id_gedung" => "required|integer",
        ], [
            "nama_kamar.required" => "Nama Kamar tidak boleh kosong", 
            "nama_kamar.string" => "Nama Kamar harus berupa string",
            "kelas.required" => "Kelas tidak boleh kosong", 
            "kelas.in" => "Kelas harus berupa enum",
            "fasilitas.required" => "Fasilitas tidak boleh kosong", 
            "fasilitas.string" => "Fasilitas harus berupa string",
            "harga_kamar.required" => "Harga Kamar tidak boleh kosong", 
            "harga_kamar.string" => "Harga Kamar harus berupa string",
            "jumlah_kasur.required" => "Jumlah Kasur tidak boleh kosong", 
            "jumlah_kasur.integer" => "Jumlah Kasur harus berupa integer",
            "id_ruang.required" => "Nama Ruang tidak boleh kosong", 
            "id_ruang.integer" => "Nama Ruang harus berupa integer",
            "id_gedung.required" => "Nama Gedung tidak boleh kosong", 
            "id_gedung.integer" => "Nama Gedung harus berupa integer",
        ]);

        $kamar->nama_kamar = $request->input("nama_kamar");
        $kamar->id_ruang = $request->input("id_ruang");
        $kamar->kelas = $request->input("kelas");
        $kamar->fasilitas = $request->input("fasilitas");
        $kamar->harga_kamar = $request->input("harga_kamar");
        $kamar->jumlah_kasur = $request->input("jumlah_kasur");

        $kamar->save();
        return redirect()->route("kamar.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route("kamar.index");
    }
}
