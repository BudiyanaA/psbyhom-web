<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrEwallet;

class EwalletController extends Controller
{
    public function index()
    {
        $data['ewallet'] = TrEwallet::with(['msCustomer', 'po'])
                                        ->orderBy('trans_date', 'DESC')->get();
        return view('ewallet.index',$data);
    }
}
