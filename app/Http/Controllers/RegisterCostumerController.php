<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Registercostumer;
use App\Models\Region;

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

    public function store (Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'nohp_1' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'captcha' => 'required|captcha',
        ]);
        try {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'costumer'
        ]);

        Registercostumer::create([
            'nohp_1' => $request->nohp_1,
            'nohp_2' => $request->nohp_2,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'captcha' => $request->captcha,
        ]);

        return redirect(route('home'))
                ->withSuccess("Berhasil Registrsi,Silahkan Login Untuk Masuk Ke Akun Anda");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }

}
