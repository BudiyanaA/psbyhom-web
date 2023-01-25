<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function index()
    {
        
        return view('system.index');
    }

    public function create()
    {
        return view('system.create');
    }

    public function store(Request $request)
    {
        //    
    }

    public function edit($id)
    {  
        return view('system.edit');
    }

    public function update(Request $request, $id)
    {
    //    
    }

    public function destroy($id)
    {
    //    
    }
}
