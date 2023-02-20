<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index()
    {
        
        return view('approval.index');
    }
    public function edit(Request $request, $id)
    {
       
            return view('approval.edit');
        
    }

    public function show(Request $request, $id)
    {
        return view('approval.detail');
    }

}
