<?php

namespace App\Http\Controllers;

use App\Kamar;
use Illuminate\Http\Request;
use App\Poli;
use App\Ruang;
use App\User;
use Hash;
use Illuminate\Database\Eloquent\Builder;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Responuse
     */
    public function create()
    {
        return view("superadmin.form");
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
            "nama_poli" => "required|string", 
            "alamat" => "required|string",
            "akreditasi" => "required|string"
        ], [
            "nama_poli.required" => "Nama Pelayanan Kesehatan tidak boleh kosong", 
            "nama_poli.string" => "Nama Pelayanan Kesehatan harus berupa string",
            "alamat.required" => "Alamat tidak boleh kosong",
            "alamat.string" => "Alamat harus berupa string",
            "akreditasi.required" => "Akreditasi tidak boleh kosong",
            "akreditasi.string" => "Akreditasi harus berupa string",
        ]);

        $data_poli = $request->only([
            "nama_poli",
            "alamat",
            "akreditasi",
        ]);

        $poli = Poli::create($data_poli);

        $username = lcfirst(join("", explode(" ", ucwords($request->input("nama_poli")))));
        $password = Hash::make("0123456789");

        $data_user = [
            "username" => $username,
            "password" => $password,
            "jenis_user" => 2
        ];
        $akun = User::create($data_user);

        $akun->poli()->save($poli);

        return redirect()->route("superadmin.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Poli $poli)
    {
        $pegawais = $poli->pegawai;
        $perawats = $poli->perawat;

        $count_pasien = $poli->rawatInap()->whereNull("tgl_keluar")->count();

        $count_ruangan = Kamar::wherePoli($poli->id_poli)->count();
        $count_ruangan_tersedia = Kamar::wherePoli($poli->id_poli)->whereColumn("kasur_terisi", "<", "jumlah_kasur")->count();

        return view('superadmin.admin.index', [
            'poli' => $poli,
            'pegawais' => $pegawais,
            'perawats'  => $perawats,
            'count_pasien' => $count_pasien,
            "count_ruangan" => $count_ruangan,
            "count_ruangan_tersedia" => $count_ruangan_tersedia
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Poli $poli)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poli $poli)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Poli $poli)
    {
        if ($poli->akun) {
            $poli->akun->delete();
        }

        return redirect()->route("superadmin.index");
    }

    public function dokter(Request $request, Poli $poli)
    {
        return view("superadmin.admin.dokter.index", ["dokters" => $poli->dokter]);
    }
    public function fasilitas(Request $request, Poli $poli)
    {
        return view("superadmin.admin.fasilitas.index", ["fasilitas" => $poli->fasilitas]);
    }
    public function pegawai(Request $request, Poli $poli)
    {
        return view("superadmin.admin.pegawai.index", ["pegawais" => $poli->pegawai]);
    }
    public function perawat(Request $request, Poli $poli)
    {
        return view("superadmin.admin.perawat.index", ["perawats" => $poli->perawat]);
    }
    public function ruangan(Request $request, Poli $poli)
    {
        return view("superadmin.admin.ruangan.index", ["poli" => $poli, "kamars" => Kamar::wherePoli($poli->id_poli)->get()]);
    }
    public function shift(Request $request, Poli $poli)
    {
        return view("superadmin.admin.shift.index", ["shifts" => $poli->shift]);
    }
    public function kamar(Request $request, Poli $poli)
    {
        return view("superadmin.admin.ruangan.kamar.index", ["kamars" => Kamar::wherePoli($poli->id_poli)->get()]);
    }
    public function ruang(Request $request, Poli $poli)
    {
        $ruangs = Ruang::whereHas("gedung", function (Builder $query) use ($poli) {
            $query->where("id_poli", $poli->id_poli);
        })->orderBy("nama_ruang")->get();
        return view("superadmin.admin.ruangan.ruang.index", ["ruangs" => $ruangs]);
    }
    public function gedung(Request $request, Poli $poli)
    {
        return view("superadmin.admin.ruangan.gedung.index", ["gedungs" => $poli->gedung]);
    }
}
