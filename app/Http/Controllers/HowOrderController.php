<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HowOrderController extends Controller
{
    public function index()
    {
        return view('how_order.index');
    }
}
