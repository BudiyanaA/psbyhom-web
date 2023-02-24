<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Registercostumer;
use App\Models\Region;
use App\Models\SysParam;
use App\Mail\RegisterEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\LogActv;

class RegisterCostumerController extends Controller
{
    public function index()
    {
        
        return view('register_c.index');
    }
    

    public function create()
    {
        // $data['province'] = Region::whereRaw('CHAR_LENGTH(kode) = 2')->get();
        // $data['cities'] = Region::whereRaw('LEFT(kode, 2) = ?' , [$province_id])
        //     ->whereRaw('CHAR_LENGTH(kode) = 5')
        //     ->get();
        // $data['districts'] = Region::whereRaw('LEFT(kode, 5) = ?' , [$city_id])
        //     ->whereRaw('CHAR_LENGTH(kode) = 8')
        //     ->get();
        return view('register_c.create');
    }

    function newid()
		{
			$uuid = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			mt_rand( 0, 0x0fff ) | 0x4000,
			mt_rand( 0, 0x3fff ) | 0x8000,
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
			return $uuid;
		}


    public function store (Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email|unique:ms_customer',
            'password' => 'required|confirmed|min:6',
            'handphone' => 'required',
            'address' => 'required',
            // 'province' => 'required',
            // 'city' => 'required',
            // 'district' => 'required',
            'captcha' => 'required|captcha',
        ]);
        
        // cek captcha benar atau tidak
        if (!$validated['captcha']) {
            return redirect()->back()->with('error', 'Error: captcha tidak benar!');
        }
        
        try {
            $CustomerUUID = $this->newid();
            $token_id = $this->newid();

            Registercostumer::create([
                'CustomerUUID' => $CustomerUUID,
                'token_id' => $token_id,
                'customer_name' => $request->customer_name,
                'password' => sha1($request->password."sheryl1!"),
                'email' => $request->email,
                'handphone' => $request->handphone,
                'handphone2' => $request->handphone2,
                'fax' => $request->fax,
                'address' => $request->address,
                'kodepos' => '44181',
                'provinsi' => $request->provinsi,
                'kecamatan' => $request->kecamatan,
                'kota' => $request->kota,
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'status' => '03',
                'created_date' => date('Y-m-d H:m:s'),
                'created_by' => $CustomerUUID,
                'OnDateTime' => date('Y-m-d H:m:s')
            ]);
        
            // kirim email aktivasi
        $activation_link = url('activate/'.$token_id);

        // ambil email_notif dari database

        Mail::to("dederizki130102@gmail.com")->send(new RegisterEmail());
        
            // buat log aktivitas
            $id = $this->newid();
            LogActv::create([
                'id' => $id,
                'user_id' => $CustomerUUID,
                'UserUUID' => $CustomerUUID,
                'menu_nm' => 'Customer Register',
                'log_time' => date('Y-m-d H:i:s'),
                'Description' => 'Customer Register dengan email : ',
                'LogType' => 'Create',
                'user_type' => 'Customer',
                'RefUUID' => $CustomerUUID,
                'is_financial' => '0',
                'is_error' => '0',
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);
        return redirect(route('loginaction'))
                ->withSuccess("Registrasi Sukses, Silahkan Periksa Email Anda Untuk Mulai Mengaktifkan Akun Anda...");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }

}
