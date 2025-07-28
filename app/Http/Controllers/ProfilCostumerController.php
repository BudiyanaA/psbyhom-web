<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registercostumer;

class ProfilCostumerController extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        $profil = Registercostumer::where('CustomerUUID', $userId)->first(); 
        return view('profil_c.index', ['profil' => $profil]);
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

    public function update(Request $request)
    {
        try {

            $email = $request->input('email');
            $customer_name = $request->input('customer_name');
            $handphone = $request->input('handphone');
            $handphone2 = $request->input('handphone2');
            $address = $request->input('address');
            $zip_code = $request->input('kodepos');
            $province = $request->input('province');
            $cities = $request->input('cities');
            $district = $request->input('kecamatan');
            $CustomerUUID = $this->newid();
            $userId = session('user_id');
            Registercostumer::where('CustomerUUID', $userId)->update([
                'email' => $email,
                'customer_name' => $customer_name,
                'handphone' => $handphone,
                'handphone2' => $handphone2,
                'kodepos' => $zip_code,
                'provinsi_new' => $province,
                'kota_new' => $cities,
                'kecamatan_new' => $district,
            ]);
    
        
            return redirect(route('profile'))
            ->withSuccess("Data berhasil diubah");
        } catch(\Exception $e) {
            dd($e);
            return redirect()->back()->withError('Data gagal diubah');
        } 
    }
}
