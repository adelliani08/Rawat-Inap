<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login_page(Request $request)
    {
        return view("login");
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            "username" => ["required"],
            "password" => ["required"]
        ]);

        if (Auth::attempt($request->only(["username", "password"]))) {
        }
        return back();

    }

    public function logout_proses(Request $request)
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
