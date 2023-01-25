<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LpConfirmationController extends Controller
{
    public function index()
    {
        
        return view('lpconfirmation.index');
    }
}
