<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrEwallet;
use App\Models\TrWithdrawal;

class WalletController extends Controller
{
    public function index()
    {
        
        $data['wallet'] = TrEwallet::with(['msCustomer', 'po'])
                                        ->orderBy('trans_date', 'DESC')->get();
        $data['withdrawal'] = TrWithdrawal::orderBy('trans_date', 'DESC')->get();
        return view('wallet.index',$data);
    }

    public function store(Request $request)
    {
        
        $CustomerUUID = session('user_id');
        $ewallet = TrEwallet::where('CustomerUUID', $CustomerUUID)->sum('amount');
        try {
            
            TrWithdrawal::create([
                'withdrawUUID' => $this->newid(),
                'CustomerUUID' => $CustomerUUID,
                'bank_name' => $request->bank_name,
                'account_no' => $request->account_no,
                'account_name' => $request->account_name,
                'status' => '00',
                'trans_date' => date('Y-m-d H:i:s'),
                'amount' => $ewallet,
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);

            TrEwallet::where('CustomerUUID', $CustomerUUID)->create([
                'EWalletUUID' => $this->newid(),
                'CustomerUUID' => $CustomerUUID,
                'POUUID' => '',
                'trans_date' => date('Y-m-d H:i:s'), 
                'amount' => "-".$ewallet,
                'description' => "Customer Withdraw All of His/Her E-Wallet",
            ]);

            // TODO: Send Email
        
            return redirect(route('ewallet'))
                ->withSuccess("Data berhasil ditambahkan");
                
        } catch(\Exception $e) {
            dd($e);
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }
}
