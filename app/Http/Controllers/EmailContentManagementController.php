<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailContentManagementController extends Controller
{
    public function index()
    {
        
        return view('email.index');
    }
}
