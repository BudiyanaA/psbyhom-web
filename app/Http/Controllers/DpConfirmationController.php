<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DpConfirmationController extends Controller
{
    public function index()
    {
        
        return view('dpconfirmation.index');
    }

}
