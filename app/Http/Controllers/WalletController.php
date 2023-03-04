<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrEwallet;

class WalletController extends Controller
{
    public function index()
    {
        
        $data['wallet'] = TrEwallet::with(['msCustomer', 'po'])
                                        ->orderBy('trans_date', 'DESC')->get();
        return view('wallet.index',$data);
    }
}
