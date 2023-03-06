<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsEmail;

class EmailContentManagementController extends Controller
{
    public function index()
    {
        $data['emails'] = MsEmail::get();
        return view('email.index',$data);
    }

    public function edit($id)
{
    $emails = MsEmail::where('EmailUUID',$id)->first();
    return view('email.edit', compact('emails'));
}
}
