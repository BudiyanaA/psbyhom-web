<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Voucher;

class VoucherManagementController extends Controller
{
    public function index()
    {
        $data['vouchers'] = DB::table('vouchers')->get();
        return view('voucher.index', $data);
    }

    public function create()
    {
        return view('voucher.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'voucher_id' => 'required',
            'expiry_date' => 'required',
            'discount_amount' => 'required',
            'remarks' => 'required',
        ]);

        try {

            Voucher::create([
                'voucher_id' => $request->voucher_id,
                'expiry_date' => $request->expiry_date,
                'discount_amount' => $request->discount_amount,
                'remarks' => $request->remarks,
            ]);
    
            return redirect(route('voucher_management.index'))
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

        $data['voucher'] = Voucher::find($id);

        return view('voucher.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'voucher_id' => 'required',
            'expiry_date' => 'required',
            'discount_amount' => 'required',
            'remarks' => 'required',
        ]);

        try {

            $v = Voucher::find($id);
            $v->update([
                'voucher_id' => $request->voucher_id,
                'expiry_date' => $request->expiry_date,
                'discount_amount' => $request->discount_amount,
                'remarks' => $request->remarks,
            ]);
    
            return redirect(route('voucher_management.index'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal diubah');
        }
    }
}
