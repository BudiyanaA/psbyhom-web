<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrEwallet;
use Illuminate\Support\Facades\DB;

class CustomerEwalletHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        $data['user_id'] = $user_id;
        return view('customer_ewallet_history.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $validated = $request->validate([
            'trans_date' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);
        DB::beginTransaction();
        try {
            TrEwallet::create([
                'EWalletUUID' => $this->newid(),
                'CustomerUUID' => $user_id,
                'POUUID' => '',
                'trans_date' => $request->trans_date,
                'amount' => $request->amount,
                'description' => $request->description,
            ]);
            DB::commit();
            return redirect(route('customer.detail', ['id' => $user_id]))
                ->withSuccess("Data berhasil ditambahkan");
                
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $id)
    {
        try {
            $data = TrEwallet::where('EWalletUUID', $id)->delete();
            return redirect(route('customer.detail', ['id' => $user_id]))
                ->withSuccess("Data berhasil ditambahkan");

        } catch (\Exception $e) {
            return redirect()->back()->withError('Data gagal ditambahkan');
        }
    }
}
