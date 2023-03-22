<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Registercostumer;
use App\Models\LogActv;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\ResetPasswordEmail;

class PasswordCostumerController extends Controller
{

    function forgot()
    {
        return view('password_c.forgot');
    }

    function forgotaction(Request $request)
    {
        $email_forgot = $request->email_forgot;
        $customer = Registercostumer::where('email', $email_forgot)->first();
        $token_id = $this->newid();

        Registercostumer::where('CustomerUUID', $customer->CustomerUUID)
            ->update([
                'status' => '03',
                'password' => 'RESETED',
                'token_id' => $token_id
            ]);

        $EmailUUID = 'a89c2b04-b29e-4dea-8efb-e03fb548a28e'; //Reset Password Notification
        $emailsent = Mail::to($customer->email)
            ->send(new ResetPasswordEmail(
                $customer->email, 
                $customer->customer_name,
                $token_id,
                $EmailUUID
            ));
        
        LogActv::create([
            'id' => $this->newid(),
            'user_id' => $customer->CustomerUUID,
            'UserUUID' => $customer->CustomerUUID,
            'menu_nm' => 'Reset Password',
            'log_time' => date('Y-m-d H:i:s'),
            'Description' => 'Customer Submit Reset Password',
            'LogType' => 'Create',
            'user_type' => 'Customer',
            'RefUUID' => $customer->CustomerUUID,
            'is_financial' => '0',
            'is_error' => '0',
            'ByUserUUID' => $customer->CustomerUUID,
            'ByUserIP' =>  $request->ip(),
            'OnDateTime' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('password.reset.success');
    }

    function reset(Request $request)
    {
        $token_id = $request->token_id;
        $customer = Registercostumer::where('token_id', $token_id)
            ->where('status', '03')->first();
        
        if (!$customer) {
            return redirect()->route('password.reset.fail');
        }

        return view('password_c.reset', [
            'token_id' => $token_id,
            'email' => $request->email,
        ]);
    }

    function resetaction(Request $request)
    {   
        try {
            $token_id = str_replace(">", "", $request->token_id);
            $password = $request->new_password;

            $key = 'sheryl1!';
            Registercostumer::where('token_id', $token_id)
                ->update([
                    'token_id' => '',
                    'status' => '01',
                    'password' => sha1($password.$key),
                    // 'ByUserUUID' => $this->session->userdata('CustomerUUID'),	
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);
            
            return redirect()->route('password.change.success');
        } catch(\Exception $e) {
            // dd($e);
        }
    }

    function changeSuccess()
    {
        return view('password_c.changesuccess');
    }

    function resetSuccess()
    {
        return view('password_c.resetsuccess');
    }

    function resetFail()
    {
        return view('password_c.resetfail');
    }

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
