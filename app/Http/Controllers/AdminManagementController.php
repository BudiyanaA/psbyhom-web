<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminManagementController extends Controller
{
    public function index()
    {
        $data['admins'] = DB::table('users')->get();
        return view('admin.index', $data);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin'
            ]);
    
            return redirect(route('admin_management.index'))
                ->withSuccess("Data berhasil ditambahkan");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {  
        $data['admin'] = User::find($id);
        return view('admin.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {

            $a = User::find($id);
            $a->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            return redirect(route('admin_management.index'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal diubah');
        }
    }

    public function destroy($id)
    {
    //    
    }
}
