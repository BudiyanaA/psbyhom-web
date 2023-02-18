<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Models\Contac;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
{
    // Validate form fields
    $validated = $request->validate([
        'name' => 'required',
        'po_number' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'message' => 'required',
        'g-recaptcha-response' => 'required|captcha'
    ]);

    // Validate reCAPTCHA response using the NoCaptcha facade
    if (NoCaptcha::verifyResponse($request->input('g-recaptcha-response'))) {
        // reCAPTCHA response is valid

        try {
            // Save form data to database
            Contac::create([
                'name' => $request->name,
                'po_number' => $request->po_number,
                'phone' => $request->phone,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            return redirect(route('contac.index'))
                ->withSuccess("Data berhasil ditambahkan");

        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal ditambahkan');
        }

    } else {
        // reCAPTCHA response is invalid
        return redirect()->back()->withErrors(['g-recaptcha-response' => 'Invalid reCAPTCHA response']);
    }
}

}
