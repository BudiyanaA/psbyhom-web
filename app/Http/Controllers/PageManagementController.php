<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageManagementController extends Controller
{
    public function index()
    {
        
        return view('pagemanagement.index');
    }
}
