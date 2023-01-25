<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankManagementController extends Controller
{
    public function index()
    {
        
        return view('bank.index');
    }

    public function create()
    {
        return view('bank.create');
    }

    public function store(Request $request)
    {
        //    
    }

    public function edit($id)
    {  
        return view('bank.edit');
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
