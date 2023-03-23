<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrRequestOrder;
use App\Models\TrPo;

class DashboardController extends Controller
{
    public function index()
    {
        $data['flag_sensitive_data'] = '1';
        $data['total_new'] = 0;
        $data['total_dp'] = 0;
        $data['total_goodies'] = 53;
        $data['total_fp']  = 79;

        $data['pending_request_order'] = [];
        $data['total_pending_dp'] = [];
        $data['total_pending_fp'] = [];
        $data['top_5_customer'] = [];
        $data['waiting_approval'] = [];
        $data['total_waiting_goodies'] = [];
        $data['total_waiting_processed'] = [];
        $data['top_5_product'] = [];
        $data['orders'] = TrRequestOrder::with('customer')->where('status', '00')->orderBy('OnDateTime', 'DESC')->get();
        $data['dppayment'] = TrPo::with(['msCustomer', 'trRequestOrder','msBatch','msStatus'])->where('status', '00')->orderBy('OnDateTime', 'DESC')->get();
        $data['lppayment'] = TrPo::with(['msCustomer', 'trRequestOrder','msBatch','msStatus'])->where('status', '00')->orderBy('OnDateTime', 'DESC')->get();
        $data['approval'] = TrRequestOrder::with('customer')->whereIn('status', ['01', '02'])->orderBy('OnDateTime', 'DESC')->get();
        $data['waitinggoods'] = TrPo::whereIn('status', ['02', '03'])
            ->with(['msCustomer', 'poDtls', 'poDtls.requestOrderDtl'])
            ->with('poDtls', function ($query) {
                $query->orderBy('seq', 'ASC');
            })
            ->orderBy('verify_payment_date', 'DESC')
            ->get();
            $data['readytoship'] = TrPo::with(['msCustomer', 'trRequestOrder','msBatch','msStatus'])->where('status', '06')->orderBy('OnDateTime', 'DESC')->get();
        return view('dashboard', $data);
    }
}
