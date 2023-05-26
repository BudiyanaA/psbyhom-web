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
    $customer_name = $request->input('customer_name');
    $total_price = $request->input('total_price');
    $request_id = $request->input('request_id');
    $order_by = $request->input('order_by', 'DESC');

    $orders = TrRequestOrder::with('customer')->whereNull('po_type');

    if ($status) {
        $orders = $orders->where('status', $status);
    }

    if ($customer_name) {
        $orders = $orders->whereHas('customer', function($query) use($request) {
            $query->where('customer_name', 'like', '%'.$request->customer_name.'%');
        });
    }

    if ($total_price) {
        // Menghapus tanda koma dari input pencarian
        $total_price = str_replace(',', '', $total_price);
    
        // Melakukan pencarian dengan operator LIKE
        $orders = $orders->where('total_price', 'like', '%' . $total_price . '%');
    }

    if ($request_id) {
        $orders = $orders->where('request_id', 'like', '%'.$request_id.'%');
    }

    $threeMonthsAgo = now()->subMonths(3);
    $orders = $orders->where('OnDateTime', '>=', $threeMonthsAgo);

    $orders = $orders->orderBy('OnDateTime', $order_by)->get();

    $data['orders'] = $orders;
    $data['customer_name'] = $customer_name;
    $data['total_price'] = $total_price;
    $data['request_id'] =$request_id;
    $data['order_by'] = $order_by;

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
