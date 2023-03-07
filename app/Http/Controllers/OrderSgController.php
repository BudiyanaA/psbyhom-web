<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrRequestOrder;

class OrderSgController extends Controller
{
    public function index(Request $request)
{
    $data = array();
    $status = $request->input('status');
    $trans_date_start = $request->input('trans_date_start');
    $trans_date_end = $request->input('trans_date_end');
    $request_id = $request->input('request_id');
    
    
    $orders = TrRequestOrder::with('customer')->where('po_type', 'SG');

    if ($status) {
        $orders = $orders->where('status', $status);
    }

    if ($trans_date_start) {
        $orders = $orders->where('created_date', '>=', $trans_date_start);
    }

    if ($trans_date_end) {
        $orders = $orders->where('created_date', '<=', $trans_date_end);
    }

    if ($request_id) {
        $orders = $orders->where('request_id', $request_id);
    }
    

    $orders = $orders->orderBy('OnDateTime', 'ASC')->get(); //ASC or DESC from filter

    $data['orders'] = $orders;

    if ($status === '00') {
        return view('order_sg.index', $data);
    } else if ($status === '01') {
        return view('approval_sg.index', $data);
    } else {
        throw new \InvalidArgumentException('Invalid status code');
    }
}
}
