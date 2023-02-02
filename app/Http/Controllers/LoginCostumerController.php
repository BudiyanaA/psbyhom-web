<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginCostumerController extends Controller
{
    public function index()
    {
        return view('login_c.index');
    }
}
