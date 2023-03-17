<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MsVoucher;

class VoucherManagementController extends Controller
{
    public function index()
    {
        $data['vouchers'] = MsVoucher::get();
        return view('voucher.index', $data);
    }

    public function create()
    {
        return view('voucher.create');
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'voucher_id' => 'required',
            'valid_until_date' => 'required',
            'discount_amount' => 'required',
            'remarks' => 'required',
        ]);
        $AdminUUID = session('admin_id');
        DB::beginTransaction();
        try {

            MsVoucher::create([
                'VoucherUUID' => $this->newid(),
                'voucher_id' => $request->voucher_id,
                'created_date' => date('Y-m-d H:i:s'),
                'valid_until_date' => $request->valid_until_date,
                'discount_amount' => $request->discount_amount,
                'POUUID' => $this->newid(),
                'status' => '00',
                'ByUserUUID' => $AdminUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s'),
                'remarks' => $request->remarks,
            ]);
            DB::commit();
            return redirect(route('voucher_management.index'))
                ->withSuccess("Data berhasil ditambahkan");
                
        } catch(\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $data['voucher'] = MsVoucher::where('VoucherUUID',$id)->first();

        return view('voucher.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            // 'voucher_id' => 'required',
            // 'expiry_date' => 'required',
            // 'discount_amount' => 'required',
            // 'remarks' => 'required',
        ]);
        DB::beginTransaction();
        try {

            MsVoucher::where('VoucherUUID',$id)
            ->update([
                'voucher_id' => $request->voucher_id,
                'created_date' => date('Y-m-d H:i:s'),
                'valid_until_date' => $request->valid_until_date,
                'discount_amount' => $request->discount_amount,
                'remarks' => $request->remarks,
    ]);
    DB::commit();
            return redirect(route('voucher_management.index'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->withError('Data gagal diubah');
        }
    }
}
