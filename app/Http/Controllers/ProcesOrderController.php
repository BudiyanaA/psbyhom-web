<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Processorder;
use App\Mail\PostEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\TrRequestOrderDtl;

class ProcesOrderController extends Controller
{
    public function index()
    {
        // $data['requestorder'] = TrRequestOrder::where('RequestOrderUUID')->first();
        $latest_id = DB::table('tr_request_order_dtl')->max('id');
        $data['preorders'] = TrRequestOrderDtl::where('id', $latest_id)
            ->get();
        return view('processorder.index',$data);
    }

    public function create()
    {
    //    
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required',
        'address' => 'required',
        'province' => 'required',
        'city' => 'required',
        'district' => 'required',
        'courier' => 'required',    
        'delivery' => 'required',
        'zip_code' => 'required',
        'nohp_1' => 'required',
    ]);

    try {

        Processorder::create([
            'name' => $request->name,
            'address' => $request->address,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'courier' => $request->courier,
            'delivery' => $request->delivery,
            'zip_code' => $request->zip_code,
            'nohp_1' => $request->nohp_1,
            'nohp_2' => $request->nohp_2,
        ]);

        Mail::to("dederizki130102@gmail.com")->send(new PostEmail());

        return redirect(route('process_order.notification'))
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
// 
    }
    public function update(Request $request, $id)
    {
        // 
    }
    public function notification()
    {
        return view('processorder.notification');
    }
}
