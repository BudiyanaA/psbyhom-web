<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlideManagementController extends Controller
{
    public function index()
    {
        
        return view('slideshow.index');
    }
}
