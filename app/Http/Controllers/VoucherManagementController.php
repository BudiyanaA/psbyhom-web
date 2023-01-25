<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherManagementController extends Controller
{
    public function index()
    {
        
        return view('voucher.index');
    }

    public function create()
    {
        return view('voucher.create');
    }

    public function store(Request $request)
    {
        //    
    }

    public function edit($id)
    {  
        return view('voucher.edit');
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
