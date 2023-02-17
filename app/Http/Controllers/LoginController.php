<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('admin');
        }else{
            return view('login.index');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('admin');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function forgot()
    {
       
            return view('login.forgotpassword');
       
    }
}
