<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminManagementController extends Controller
{
    public function index()
    {
        
        return view('admin.index');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        //    
    }

    public function edit($id)
    {  
        return view('admin.edit');
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
