<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailContentManagementController extends Controller
{
    public function index()
    {
        $data['emails'] = DB::table('users')->get();
        return view('email.index',$data);
    }
}
