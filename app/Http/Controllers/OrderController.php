<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrRequestOrder;

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
    $trans_date_start = $request->input('trans_date_start');
    $trans_date_end = $request->input('trans_date_end');
    $request_id = $request->input('request_id');
    

    $orders = TrRequestOrder::with('customer')->whereNull('po_type');

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
        $orders = $orders->where('request_id', 'like', '%'.$request_id.'%');
    }

    $threeMonthsAgo = now()->subMonths(3);
    $orders = $orders->where('OnDateTime', '>=', $threeMonthsAgo);

    $orders = $orders->orderBy('OnDateTime', 'DESC')->get(); //TODO: ASC or DESC from filter

    $data['orders'] = $orders;

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
