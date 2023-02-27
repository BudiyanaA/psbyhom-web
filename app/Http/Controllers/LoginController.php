<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('admin');
        }else{
            return view('login.index');
        }
    }

    public function actionlogin(Request $request)
    {
        $username = $request->input('name');
        $password = $request->input('password');
        
        // Cari admin dengan user_id dan is_delete = 0
        $admin = DB::table('ms_admin')->where('user_id', $username)->where('is_delete', 0)->first();
        if (!$admin) {
            // Jika tidak ditemukan, kembalikan 3
            // return 3;
            $error_message = 'Invalid username or password';
            Session::flash('error', $error_message);
            return redirect('admin/login');
        }

        $admins = DB::table('ms_admin')
            ->where('user_id', $username)
            ->where('password', sha1($password.'iFabula1!'))
            ->where('is_delete', 0)
            ->where('status', '01')
            ->get();
        
        // Jika ditemukan, cek apakah password sesuai
        if (count($admins) <= 0) {
            $max_attempt = 3;
            $login_attempt = $admin->login_attemp + 1;
            
            // Jika login_attemp >= $max_attempt, update status = 02 dan kembalikan pesan kesalahan
            if ($login_attempt >= $max_attempt) {
                DB::table('ms_admin')->where('user_id', $username)->update(['status' => '02']);
                $error_message = 'Your account is locked';
            } else {
                // Jika tidak, update login_attemp + 1 dan kembalikan pesan kesalahan
                DB::table('ms_admin')->where('user_id', $username)->update(['login_attemp' => $login_attempt]);
                $error_message = 'Invalid username or password';
            }
            
            Session::flash('error', $error_message);
            return redirect('admin/login');
        }
        
        // Jika password sesuai, cari admin dengan kriteria yang lebih lengkap
        $admins = DB::table('ms_admin')->where('user_id', $username)->where('password', sha1($password.'iFabula1!'))->where('is_delete', 0)->where('status', '01')->get();
        
        if (count($admins) > 1) {
            $error_message = 'Invalid username or password';

            Session::flash('error', $error_message);
            return redirect('admin/login');
        }
        
        // Jika ditemukan, update login_attemp = 0 dan last_login, is_login
        $admin = $admins[0];
        DB::table('ms_admin')->where('AdminUUID', $admin->AdminUUID)->update([
            'login_attemp' => 0,
            'last_login' => date('Y-m-d H:i:s'),
            'is_login' => 'Y'
        ]);
        session(['admin_id' => $admin->AdminUUID, 'admin_name' => $admin->name]);
        return redirect('admin');
    }

    public function actionlogout()
    {
        session()->forget('admin_id');
        return redirect('admin/login');
    }

    public function forgot()
    {
       
            return view('login.forgotpassword');
       
    }
}
