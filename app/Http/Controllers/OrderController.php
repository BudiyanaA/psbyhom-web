<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrRequestOrder;

class OrderController extends Controller
{
    public function index(Request $request)
    { 

        $data['orders'] = TrRequestOrder::with('customer')
        ->when(request()->filled('trans_date_start') && request()->filled('trans_date_end'), function ($query) {
            $query->whereBetween('created_date', [request()->input('trans_date_start'), request()->input('trans_date_end')]);
        })
        ->when(request()->filled('request_id'), function ($query) {
            $query->where('request_id', request()->input('request_id'));
        })
        ->when(request()->filled('status'), function ($query) {
            $query->where('status', request()->input('status'));
        })
        ->orderBy('OnDateTime', 'DESC')
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
