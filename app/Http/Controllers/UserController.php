<?php

namespace App\Http\Controllers;

use User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        if (Auth::user()->poli) {
            return view("user.poli", ["user" => Auth::user()]);
        } elseif (Auth::check()) {
            return view("user.staff", ["user" => Auth::user()]);
        }
        return abort(401);
    }

    public function ubah_password(Request $request)
    {
        $user = Auth::user();

        $password_lama = $request->input("password");
        $password_baru = $request->input("password_baru");
        $password_konfirm = $request->input("konfirmasi_password");

        if (Hash::check($password_lama, $user->password) && ($password_baru == $password_konfirm)) {
            $user->password = Hash::make($password_baru);
            $user->save();
        }

        return back();
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $password_lama = $request->input("password");


        if (Hash::check($password_lama, $user->password)) {
            if ($user->poli) {
                $data_poli = $request->only(["alamat", "nama_poli", "akreditasi"]);
                $user->poli->update($data_poli);
            }
            $user->username = $request->input("username");
            $user->save();
        }
        return back();
    }
}
