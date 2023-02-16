<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('password.edit');
    }

    public function update(UpdatePasswordRequest $request)
{
    $request->user()->update([
        'password' => Hash::make($request->get('password'))
    ]);

    return redirect()->route('user.password.edit');
}
}
