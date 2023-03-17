<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MsBank;


class BankManagementController extends Controller
{
    public function index()
    {
        $data['banks'] = MsBank::get();
        return view('bank.index', $data);
    }

    public function create()
    {
        return view('bank.create');
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
        $AdminUUID = session('admin_id');
        $username = session('admin_name');

        $validated = $request->validate([
            'bank_name' => 'required',
            'bank_account_name' => 'required',
            'bank_account_no' => 'required',
            'status' => 'required',
            // 'notes' => 'required',
        ]);
        DB::beginTransaction();
        try {

            MsBank::create([
                'BankUUID' => $this->newid(),
                'bank_name' => $request->bank_name,
                'bank_account_name' => $request->bank_account_name,
                'bank_account_no' => $request->bank_account_no,
                'status' => '00',
                'created_by' => $username,
                'created_date' => date('Y-m-d H:i:s'),
                'ByUserUUID' =>$AdminUUID,
                'ByUserIP' =>  $request->ip(),
                'OnDateTime' =>  date('Y-m-d H:i:s')
            ]);
            DB::commit();
            return redirect(route('bank_management.index'))
                ->withSuccess("Data berhasil ditambahkan");
                
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $data['bank'] = MsBank::where('BankUUID',$id)->first();

        return view('bank.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'bank_name' => 'required',
            'bank_account_name' => 'required',
            'bank_account_no' => 'required',
            'status' => 'required',
            // 'notes' => 'required',
        ]);
        DB::beginTransaction();
        try {

            MsBank::where('BankUUID',$id)
                    ->update([
                'bank_name' => $request->bank_name,
                'bank_account_name' => $request->bank_account_name,
                'bank_account_no' => $request->bank_account_no,
                'status' => $request->status,
                // 'notes' => $request->notes,
            ]);
            DB::commit();
            return redirect(route('bank_management.index'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->withError('Data gagal diubah');
        }
    }
}
