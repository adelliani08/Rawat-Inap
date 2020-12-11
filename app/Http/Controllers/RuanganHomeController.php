<?php

namespace App\Http\Controllers;

use App\Gedung;
use App\Kamar;
use App\Ruang;
use Auth;
use Illuminate\Http\Request;

class RuanganHomeController extends Controller
{
    public function __invoke()
    {
        $id_poli = Auth::user()->poli->id_poli;

        $kamars = Kamar::wherePoli($id_poli)->get();
        return view('admin.ruangan.index', [
            'kamars'  => $kamars,
        ]);
    }
}
