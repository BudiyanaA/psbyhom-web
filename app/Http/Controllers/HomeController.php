<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsFrontpageSlideshow;

class HomeController extends Controller
{
    public function index()
    {
        $data['slides'] = MsFrontpageSlideshow::where('status', '01')
            ->orderBy('seq', 'ASC')->get();
        return view('home', $data);
    }
}
