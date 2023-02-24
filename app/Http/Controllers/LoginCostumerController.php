<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Registercostumer;

class LoginCostumerController extends Controller
{
    public function index()
    {
        return view('login_c.index');
    }

    public function loginaction(Request $request)
    {
        $customer = RegisterCostumer::where('email', $request->input('email'))->first();

        if ($customer && sha1($request->input('password') . "sheryl1!") === $customer->password) {
            // Login berhasil
            session()->put('user_id', $customer->CustomerUUID);
            session(['customer_name' => $customer->customer_name]);
            return redirect('/');
        } else {
            // Login gagal
            Session::flash('error', 'Email atau Password Salah');
            return redirect('login');
        }
    }

    public function logoutaction ()
    {
        session()->forget('user_id');
        return redirect('/');
    }

}
