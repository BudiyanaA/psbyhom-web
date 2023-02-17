<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use Auth;
use App\Models\User;

class ProfilController extends Controller
{
    public function index()
    {
        $data['profil'] = Profil::where('id', Auth::user())->first();
        return view('profil.index',$data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'email' => 'required|email|unique:users',
            'status' => 'required',
        ]);

        try {
            $payload_user = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            
            User::where('id', Auth::id())->update($payload_user);
            
            $payload_profil = [
                'status' => $request->status,
            ];
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name_image = time()."_".$image->getClientOriginalName();
                $destination = 'assets/images';
                $image->move($destination, $name_image);
                $payload_profil['image'] = $name_image;
            }
            
            Profil::updateOrCreate(['id' => Auth::id()], $payload_profil);
            
            return redirect(route('profil.index'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal diubah');
        }
    }
}
