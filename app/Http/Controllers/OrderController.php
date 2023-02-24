<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrRequestOrder;

class OrderController extends Controller
{
    public function index(Request $request)
    { 
        $trans_date_start = '2022-02-01 00:00:00';
        $trans_date_end = '2022-02-28 23:59:59';
        $request_id = 'req001';
        $status = 'Open';
        $data['orders'] = TrRequestOrder::with('customer')
        ->whereBetween('created_date', [$trans_date_start, $trans_date_end])
        ->where('request_id', $request_id)
        ->where('status', $status)
        ->get();
$status = $request->input('status');
if($status === '00') {

            return view('order.index',$data);
        } else if($status === '01') {
           
            return view('approval.index',$data);
        } else {
           
            throw new \InvalidArgumentException('Invalid status code');
        }
    }

    public function edit(Request $request, $id)
    {
       
            return view('approval.edit');
        
    }

    public function show(Request $request, $id)
    {
        return view('approval.detail');
    }

}
