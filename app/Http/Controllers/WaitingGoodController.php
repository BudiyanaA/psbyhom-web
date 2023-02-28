<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrPo;

class WaitingGoodController extends Controller
{
    public function index()
    {
        $data['waitinggoods'] = TrPo::whereHas('poDtls', function ($query) {
            $query->whereIn('status', ['02', '03'])
                  ->with(['customer', 'requestOrderDtl'])
                  ->orderBy('seq', 'ASC');
        })
        ->orderBy('verify_payment_date', 'DESC')      
        ->get();
        return view('waitinggood.index',$data);
    }
    public function updateBatchNo(Request $request) {
        $poid = $request->input('poid');
        $batchid = $request->input('batchid');
        $newBatchID = $request->input('newBatchID');
        
        // Lakukan pembaruan ke tabel 'tr_po_dtl'
        $poDtl = TrPODtl::where('id', $poid)->where('batch_no', $batchid)->first();
        $poDtl->batch_no = $newBatchID;
        $poDtl->save();
        
        return response()->json(['success' => true]);
    }
}
