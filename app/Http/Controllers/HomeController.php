<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::check()) {
            switch (Auth::user()->jenis_user) {
                case '1':
                    return redirect()->route("superadmin.index");
                    break;
                case '2':
                    return redirect()->route("admin.index");
                    break;
                case '3':
                    return redirect()->route("pasien.index");
                    break;
                case '4':
                    return redirect()->route("pelayanan.index");
                    break;
            }
        } else {
            return view("public.index");
        }
    }
}
