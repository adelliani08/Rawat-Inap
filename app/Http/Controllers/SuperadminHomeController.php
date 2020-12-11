<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poli;

class SuperadminHomeController extends Controller
{
    public function __invoke()
    {
        $polis = Poli::orderBy("nama_poli")->get();
        return view('superadmin.index',[
            'polis' => $polis,
        ]);
    }
}
