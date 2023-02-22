<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Processorder;
use App\Mail\PostEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\TrRequestOrderDtl;
use App\Models\TrRequestOrder;
use Illuminate\Support\Str;
use App\Models\RegisterCostumer;

class ProcesOrderController extends Controller
{
    public function index()
    {

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
        $data['requestorder'] = TrRequestOrder::where('RequestOrderUUID', $id)->first();
        $data['preorders'] = TrRequestOrderDtl::where('RequestOrderUUID', $id)->orderBy('seq', 'asc')->get();
        $CustomerUUID = session('user_id');
        $data['costumer'] = Registercostumer::where('CustomerUUID', $CustomerUUID)->first();

        return view('processorder.index', $data);
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
