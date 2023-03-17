<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MsAdmin;

class AdminManagementController extends Controller
{
    public function index()
    {
        $data['admins'] = MsAdmin::get();
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
            'email' => 'required|email|unique:ms_admin',
            'password' => 'required|confirmed',
        ]);

        DB::beginTransaction();
        try {

            $user = MsAdmin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'admin'
            ]);
            DB::commit();
            return redirect(route('admin.index'))
                ->withSuccess("Data berhasil ditambahkan");
                
        } catch(\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {  
        $data['admin'] = MsAdmin::where('AdminUUID',$id)->first();
        return view('admin.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:ms_admin',
            'password' => 'required|confirmed',
        ]);
        DB::beginTransaction();
        try {

            $a = MsAdmin::find($id);
            $a->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            DB::commit();
            return redirect(route('admin_management.index'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->withError('Data gagal diubah');
        }
    }

    public function destroy($id)
    {
    //    
    }
}
