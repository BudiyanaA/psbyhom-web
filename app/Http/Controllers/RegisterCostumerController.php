<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterCostumerController extends Controller
{
    public function index()
    {
        return view('register_c.index');
    }

    public function registeraction (Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'costumer'
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan userid dan password.');
        return redirect('/');
    }
}
