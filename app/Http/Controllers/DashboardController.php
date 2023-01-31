<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        return view('dashboard', $data);
    }
}
