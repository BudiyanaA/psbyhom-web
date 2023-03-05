<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrEwallet;
use App\Models\TrWithdrawal;

class EwalletController extends Controller
{
    public function index()
    {
        $data['ewallet'] = TrEwallet::with(['msCustomer', 'po'])
            ->orderBy('trans_date', 'DESC')->get();

        return view('ewallet.index',$data);
    }

    public function withdrawal()
    {
        $data['withdrawal'] = TrWithdrawal::with(['msCustomer'])
            ->orderBy('trans_date', 'DESC')->get();

        return view('ewallet.withdrawal',$data);
    }
}
