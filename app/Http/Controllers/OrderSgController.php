<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrRequestOrder;

class OrderSgController extends Controller
{
    public function removeOldUnapprovedOrders()
    {
        $threeMonthsAgo = now()->subMonths(3);
    
        TrRequestOrder::where('status', '01')
            ->where('OnDateTime', '<=', $threeMonthsAgo)
            ->delete();
    }

    public function index(Request $request)
{
    $data = array();
    $status = $request->input('status');
    $order_date_start = $request->input('order_date_start');
    $order_date_end = $request->input('order_date_end');
    $request_id = $request->input('request_id');
    $order_by = $request->input('order_by','desc');
    
    
    $orders = TrRequestOrder::with('customer')->where('po_type', 'SG');

    if ($status) {
        $orders = $orders->where('status', $status);
    }
    if ($order_date_start && $order_date_end) {
        $orders = $orders->whereBetween('created_date', [$order_date_start, $order_date_end]);
    }
    if ($request_id) {
        $orders = $orders->where('request_id', 'like', '%'.$request_id.'%');
    }
    
    $threeMonthsAgo = now()->subMonths(3);
    $orders = $orders->where('OnDateTime', '>=', $threeMonthsAgo);

    $orders = $orders->orderBy('OnDateTime', $order_by)->get(); //ASC or DESC from filter

    $data['orders'] = $orders;
    $data['order_date_start'] = $order_date_start;
    $data['order_date_end'] = $order_date_end;
    $data['request_id'] =$request_id;
    $data['order_by'] = $order_by;

    if ($status === '00') {
        return view('order_sg.index', $data);
    } else if ($status === '01') {
        return view('approval_sg.index', $data);
    } else {
        throw new \InvalidArgumentException('Invalid status code');
    }
}
}
