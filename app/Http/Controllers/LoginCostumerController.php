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
        $customer = RegisterCostumer::where('email', $request->input('email'))
            ->where('status', '01')
            ->where('password', sha1($request->input('password') . "sheryl1!"))
            ->first();
        
        if (!$customer) {
            return redirect('login')->with('error', 'Email atau Password tidak valid !');
        }

        session()->put('user_id', $customer->CustomerUUID);
        session(['customer_name' => $customer->customer_name]);
        session()->put('user_password', $customer->password);
        return redirect('/')->with('success', 'Sukses Login');
    }

    public function logoutaction ()
    {
        session()->forget('user_id');
        return redirect('/');
    }

}
