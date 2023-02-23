<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\CanEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\PaymentCostumer;
use App\Models\TrInvoice;

class PaymentCostumerController extends Controller
{
    public function index()
{
    $latest_id = DB::table('preorders')->max('id');
    $data['preorders'] = DB::table('preorders')
        ->where('id', $latest_id)
        ->get();
    return view('payment_c.index', compact('data'));
}

public function create()
    {
        $CustomerUUID = session('user_id');
        $data['invoice'] = TrInvoice::where('CustomerUUID', $CustomerUUID)->where('status_invoice', '01');

        return view('payment_c.create',$data);
    }

public function store(Request $request)
    {
    $validated = $request->validate([
        'invoice_amount' => 'required',
        'payment_amount' => 'required',
        'bank_destination' => 'required',
        'payment_date' => 'required',
        'transaction_receipt' => 'required',
        'bank_name' => 'required',
        'bank_account' => 'required',
        'account_name' => 'required',
    ]);

    try {

        PaymentCostumer::create([
            'invoice_amount' => $request->invoice_amount,
            'payment_amount' => $request->payment_amount,
            'bank_destination' => $request->bank_destination,
            'payment_date' => $request->payment_date,
            'transaction_receipt' => $request->transaction_receipt,
            'bank_name' => $request->bank_name,
            'bank_account' => $request->bank_account,
            'account_name' => $request->account_name,
        ]);

        Mail::to("dederizki130102@gmail.com")->send(new CanEmail());

        return redirect(route('payment_c.notification'))
            ->withSuccess("Data berhasil ditambahkan");

    } catch(\Exception $e) {
        dd($e);
        return redirect()->back()->withError('Data gagal ditambahkan');
    }
}

public function notification()
    {
        return view('payment_c.notification');
    }
}
