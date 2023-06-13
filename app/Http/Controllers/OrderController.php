<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrRequestOrder;
use Carbon\Carbon;

class OrderController extends Controller
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
    $customer_name = $request->input('customer_name');
    $total_price = $request->input('total_price');
    $request_id = $request->input('request_id');
    $order_by = $request->input('order_by', 'desc');
    $order_date_start = $request->input('order_date_start');
    $order_date_end = $request->input('order_date_end');

    $orders = TrRequestOrder::with('customer')->whereNull('po_type');

    
    
    

    if ($request_id) {
        $orders = $orders->where('request_id', 'like', '%'.$request_id.'%');
    }
    
   
    
    if ($order_date_start && $order_date_end) {
        $orders = $orders->whereBetween('created_date', [$order_date_start, $order_date_end]);
    }

    $threeMonthsAgo = now()->subMonths(3);
    $orders = $orders->where('OnDateTime', '>=', $threeMonthsAgo);

    $orders = $orders->orderBy('OnDateTime', $order_by)->get();

    $data['orders'] = $orders;
    $data['customer_name'] = $customer_name;
    $data['total_price'] = $total_price;
    $data['request_id'] =$request_id;
    $data['order_by'] = $order_by;
    $data['order_date_start'] = $order_date_start;
    $data['order_date_end'] = $order_date_end;

    if ($status === '00') {
        return view('order.index', $data);
    } else if ($status === '01') {
        return view('approval.index', $data);
    } else {
        throw new \InvalidArgumentException('Invalid status code');
    }
}
public function edit(Request $request, $id)
{
    $data['order'] = TrRequestOrder::find($id);
    $data['sysparam'] = SysParam::where('sys_id', 'SYS_PARAM_04')->first();
    $data['requestorder'] = TrRequestOrderDtl::get();

    return view('order.edit',$data);     
}

public function show(Request $request, $id)
{
    return view('order.detail');
}

}
