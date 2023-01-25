<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaitingGoodController extends Controller
{
    public function index()
    {
        
        return view('waitinggood.index');
    }
}
