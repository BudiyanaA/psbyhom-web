<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmpayment;
use App\Mail\ConfirmEmail;
use Illuminate\Support\Facades\Mail;

class ConfirmPaymentController extends Controller
{
    public function index()
{

    return view('confirm_payment.create');
}

    public function store(Request $request)
    {
    $validated = $request->validate([
        'invoice' => 'required',
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

        Confirmpayment::create([
            'invoice' => $request->invoice,
            'invoice_amount' => $request->invoice_amount,
            'payment_amount' => $request->payment_amount,
            'bank_destination' => $request->bank_destination,
            'payment_date' => $request->payment_date,
            'transaction_receipt' => $request->transaction_receipt,
            'bank_name' => $request->bank_name,
            'bank_account' => $request->bank_account,
            'account_name' => $request->account_name,
        ]);

        Mail::to("dederizki130102@gmail.com")->send(new ConfirmEmail());

        return redirect(route('confirm_payment.notification'))
            ->withSuccess("Data berhasil ditambahkan");

    } catch(\Exception $e) {
        dd($e);
        return redirect()->back()->withError('Data gagal ditambahkan');
    }
}

public function notification()
    {
        return view('confirm_payment.notification');
    }

}
