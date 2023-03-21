<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;

class PasswordCostumerController extends Controller
{
    public function edit()
    {
        return view('password_c.edit');
    }

    public function update(UpdatePasswordRequest $request)
    {
        try {
            $request->user()->update([
                'password' => sha1($request->get('password')),
            ]);
    
            return redirect()->route('changepassword');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('changepassword')->with('error', 'Gagal mengubah kata sandi. Silakan coba lagi.');
        }
    }
}
