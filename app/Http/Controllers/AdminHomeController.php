<?php

namespace App\Http\Controllers;

use App\Kamar;
use App\Pegawai;
use App\Perawat;
use App\RawatInap;
use Auth;
use Carbon\Carbon;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function __invoke()
    {
        $id_poli = Auth::user()->poli->id_poli;

        $current_time = Carbon::now("WIB")->format("H:i:s");
        $current_shift = Auth::user()->poli->shift()->where(function ($q3) use ($current_time) {
            $q3->where(function ($query) use ($current_time) {
                $query
                    ->whereColumn("jam_masuk", "<", "jam_keluar")
                    ->where([["jam_masuk", "<=", $current_time], ["jam_keluar", ">=", $current_time]]);
            })->orWhere(function ($query) use ($current_time) {
                $query
                    ->whereColumn("jam_masuk", ">", "jam_keluar")
                    ->where(function ($q) use ($current_time) {
                        $q
                            ->where("jam_masuk", "<=", $current_time)
                            ->orWhere("jam_keluar", ">=", $current_time);
                    });
            });
        })->first();

        $pegawais = $current_shift->pegawai ?? [];
        $perawats = $current_shift->perawat ?? [];

        $count_pasien = RawatInap::where("id_poli", $id_poli)->whereNull("tgl_keluar")->count();

        $kamar = Kamar::wherePoli($id_poli);
        $count_ruangan = $kamar->count();
        $count_ruangan_terisi = $kamar->where("kasur_terisi", ">", 0)->count();

        return view('admin.index', [
            'pegawais' => $pegawais,
            'perawats'  => $perawats,
            'count_pasien' => $count_pasien,
            "count_ruangan" => $count_ruangan,
            "count_ruangan_terisi" => $count_ruangan_terisi
        ]);
    }
}
