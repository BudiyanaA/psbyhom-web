<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginCostumerController extends Controller
{
    public function index()
    {
        return view('login_c.index');
    }

    public function loginaction (Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('home');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('home');
        }
    }

    public function logoutaction ()
    {
        Auth::logout();
        return redirect('home');
    }

}
