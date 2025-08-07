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
use Illuminate\Support\Facades\DB;

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
        // $messages = [
        //     'g-recaptcha-response.required' => 'You must check the reCAPTCHA.',
        //     'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        // ];
  
        // $validator = Validator::make($request->all(), [
        //     'g-recaptcha-response' => 'required|captcha'
        // ], $messages);

        $validated = $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email|unique:ms_customer',
            'password' => 'required|confirmed|min:6',
            'handphone' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            // 'captcha' => 'required|captcha',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        // cek captcha benar atau tidak
        // if (!$validated['captcha']) {
        //     return redirect()->back()->with('error', 'Error: captcha tidak benar!');
        // }
        DB::beginTransaction();
        try {
            $CustomerUUID = $this->newid();
            $token_id = $this->newid();

            // create customer
            Registercostumer::create([
                'CustomerUUID' => $CustomerUUID,
                'token_id' => $token_id,
                'customer_name' => $request->customer_name,
                'password' => sha1($request->password."sheryl1!"),
                'email' => $request->email,
                'handphone' => $request->handphone,
                'handphone2' => $request->handphone2,
                // 'fax' => $request->fax,
                'address' => $request->address,
                'kodepos' => '44181',
                'provinsi_new' => $request->province,
                'kecamatan_new' => $request->district,
                'kota_new' => $request->city,
                'provinsi' => '',
                'kecamatan' => '',
                'kota'  => '',
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'status' => '03',
                'created_date' => date('Y-m-d H:m:s'),
                'created_by' => $CustomerUUID,
                'OnDateTime' => date('Y-m-d H:m:s')
            ]);

            // send email activation
            $email_notif = SysParam::where('sys_id', 'SYS_PARAM_43')->first();
            Mail::to($request->email)->send(new RegisterEmail(
                $request->customer_name,
                $token_id,
                $email_notif->value_1,
            ));
        
            // buat log aktivitas
            LogActv::create([
                'id' => $this->newid(),
                'user_id' => $CustomerUUID,
                'UserUUID' => $CustomerUUID,
                'menu_nm' => 'Customer Register',
                'log_time' => date('Y-m-d H:i:s'),
                'Description' => 'Customer Register dengan email : ' . $request->email,
                'LogType' => 'Create',
                'user_type' => 'Customer',
                'RefUUID' => $CustomerUUID,
                'is_financial' => '0',
                'is_error' => '0',
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);
            DB::commit();
        return redirect(route('loginaction'))
                ->withSuccess("Registrasi Sukses, Silahkan Periksa Email Anda Untuk Mulai Mengaktifkan Akun Anda...");
                
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }

    public function activation(Request $request)
    {
        $customer = Registercostumer::where('token_id', $request->token_id)
            ->where('status', '03')->first();
        
        if (!$customer) {
            return redirect(route('register.activation.failed'));
        }

        $customer->where('CustomerUUID', $customer->CustomerUUID)
        ->update([
            'status' => '01',
            'OnDateTime'=> date('Y-m-d H:m:s'),
            'ByUserUUID' => $customer->CustomerUUID,
            'ByUserIP' => $request->ip(),
        ]);
        return redirect(route('register.activation.success'));
    }

    public function activationSuccess()
    {
        return view('register_c.activationsuccess');
    }

    public function activationFailed()
    {
        return view('register_c.activationfailed');
    }

}
