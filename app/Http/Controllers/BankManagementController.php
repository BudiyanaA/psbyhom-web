<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bank;


class BankManagementController extends Controller
{
    public function index()
    {
        $data['banks'] = DB::table('banks')->get();
        return view('bank.index', $data);
    }

    public function create()
    {
        return view('bank.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bank_name' => 'required',
            'bank_account_name' => 'required',
            'bank_account_no' => 'required',
            'status' => 'required',
            'notes' => 'required',
        ]);

        try {

            Bank::create([
                'bank_name' => $request->bank_name,
                'bank_account_name' => $request->bank_account_name,
                'bank_account_no' => $request->bank_account_no,
                'status' => $request->status,
                'notes' => $request->notes,
            ]);
    
            return redirect(route('bank_management.index'))
                ->withSuccess("Data berhasil ditambahkan");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $data['bank'] = Bank::find($id);

        return view('bank.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'bank_name' => 'required',
            'bank_account_name' => 'required',
            'bank_account_no' => 'required',
            'status' => 'required',
            'notes' => 'required',
        ]);

        try {

            $b = Bank::find($id);
            $b->update([
                'bank_name' => $request->bank_name,
                'bank_account_name' => $request->bank_account_name,
                'bank_account_no' => $request->bank_account_no,
                'status' => $request->status,
                'notes' => $request->notes,
            ]);
    
            return redirect(route('bank_management.index'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal diubah');
        }
    }
}
