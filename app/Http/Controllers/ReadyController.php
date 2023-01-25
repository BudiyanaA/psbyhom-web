<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadyController extends Controller
{
    public function index()
    {
        
        return view('ready.index');
    }
}
