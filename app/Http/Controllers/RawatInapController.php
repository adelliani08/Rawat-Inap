<?php

namespace App\Http\Controllers;

use App\Diagnosa;
use App\Kamar;
use App\Pasien;
use App\RawatInap;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RawatInapController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_poli = Auth::user()->pegawai->id_poli;
        return view('pelayanan.main.form', ["id_poli" => $id_poli]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_poli = Auth::user()->pegawai->id_poli;

        $waktu_sekarang = Carbon::now();

        $data_pasien = $request->only(['no_identitas', 'nama_pasien', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'status_perkawinan', 'gol_darah', 'agama', 'pendidikan', 'pekerjaan', 'alergi', 'alamat', 'no_hp', 'no_kk', 'nama_keluarga', 'hubungan', 'id_desa']);


        $data_rawatinap = $request->only(['tgl_masuk', 'jenis_pasien', 'no_bpjs', 'nama_pesertabpjs', 'prosedur_masuk', 'cara_masuk', 'perujuk', 'asal_rujukan', 'alasan_dirujuk', 'id_dokter', 'dokter_perujuk']);
        $data_rawatinap["id_poli"] = $id_poli;

        $data_diagnosa = $request->only(['tinggi', 'berat', 'suhubadan', 'hasil_diagnosa']);
        $data_diagnosa["waktu_diagnosa"] = $waktu_sekarang;

        $data_kamar = $request->only(['no_tempattidur', 'id_kamar']);
        $data_kamar["tgl_masuk"] = $waktu_sekarang;

        RawatInap::createFull($data_pasien, $data_rawatinap, $data_diagnosa, $data_kamar);

        return redirect()->route("pelayanan.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RawatInap  $rawatInap
     * @return \Illuminate\Http\Response
     */
    public function show(RawatInap $rawatInap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RawatInap  $rawatInap
     * @return \Illuminate\Http\Response
     */
    public function edit(RawatInap $rawatInap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RawatInap  $rawatInap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RawatInap $rawatInap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RawatInap  $rawatInap
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawatInap $rawatInap)
    {
        if (($rawatInap->tgl_keluar != null) || (!$rawatInap->siap_pulang)) {
            return abort(403,"Pasien belum boleh di pulangkan");
        } else {
            $rawatInap->tgl_keluar = Carbon::now();
            $rawatInap->kamars()->whereNull("tgl_keluar")->update(["tgl_keluar" => Carbon::now()]);
            $rawatInap->save();
            return redirect()->route("pelayanan.index");
        }
    }
}
