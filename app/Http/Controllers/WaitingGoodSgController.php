<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrPo;

class WaitingGoodSgController extends Controller
{
    public function index()
    {
        $data['waitinggoods'] = TrPo::where('status', ['02', '03'])
            ->where('po_type', 'SG')
            ->with(['msCustomer', 'poDtls', 'poDtls.requestOrderDtl'])
            ->with('poDtls', function ($query) {
                $query->orderBy('seq', 'ASC');
            })
            ->orderBy('verify_payment_date', 'DESC')      
            ->get();

        return view('waitinggood_sg.index',$data);
    }
}
