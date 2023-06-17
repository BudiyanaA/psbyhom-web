<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrPo;

class WaitingGoodSgController extends Controller
{
    public function index(Request $request)
    {
        $data['waitinggoods'] = TrPo::whereIn('status', ['02', '03'])
            ->where('po_type', 'SG')
            ->with(['msCustomer', 'poDtls', 'poDtls.requestOrderDtl'])
            ->with('poDtls', function ($query) {
                $query->orderBy('seq', 'ASC');
            });
            if ($request->status) {
                $data['waitinggoods'] = $data['waitinggoods']->whereIn('status', explode(",", $request->input('status')));
            }
            if ($request->trans_date_start) {
                $data['waitinggoods'] =$data['waitinggoods']->where('trans_date', '>=', $request->trans_date_start);
            }
            if ($request->trans_date_end) {
                $data['waitinggoods'] = $data['waitinggoods']->where('trans_date', '<=', $request->trans_date_end);
            }
            if ($request->po_id) {
                $data['waitinggoods'] = $data['waitinggoods']->where('po_id', 'like', '%'.$request->po_id.'%');
            }
            if ($request->batch_no) {
                $data['waitinggoods'] = $data['waitinggoods']->whereHas('msBatch', function($query) use($request) {
                    $query->where('batch_id', 'like', '%'.$request->batch_no.'%');
                });
            }
            if ($request->customer_name) {
                $data['waitinggoods'] = $data['waitinggoods']->whereHas('msCustomer', function($query) use($request) {
                    $query->where('customer_name', 'like', '%'.$request->customer_name.'%');
                });
            }
            $data['waitinggoods'] = $data['waitinggoods']->orderBy('OnDateTime', 'DESC')->get();

        return view('waitinggood_sg.index',$data);
    }
}
