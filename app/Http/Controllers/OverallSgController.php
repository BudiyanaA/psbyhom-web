<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverallSgController extends Controller
{
    public function index()
    {
        
        return view('overall_sg.index');
    }
}
