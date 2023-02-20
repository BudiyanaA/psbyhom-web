<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    { 
        $trans_date_start = $request->trans_date_start;
$trans_date_end = $request->trans_date_end;
$request_id = $request->request_id;
$status = $request->status;
$sort_order = $request->sort_order;

if (!in_array($sort_order, ['asc', 'desc'])) {
    $sort_order = 'asc';
}

$data['orders'] = DB::table('tr_request_order')
    
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
