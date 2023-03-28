<?php

use App\Models\TrEwallet;
use App\Models\TrRequestOrder;
use App\Models\TrPo;

if (!function_exists('getUserEwallet')) {
  function getUserEwallet()
  {
    $CustomerUUID = session('user_id');
    $ewallet = TrEwallet::where('CustomerUUID', $CustomerUUID)->sum('amount');
    return $ewallet;
  }
}

if (!function_exists('getAdminNew')) {
  function getAdminNew()
  {
    $new = TrRequestOrder::where('status', '00')
    ->whereNull('po_type')
    ->count(); 
    return $new;
  }
}

if (!function_exists('getAdminApproval')) {
  function getAdminApproval()
  {
    $approval = TrRequestOrder::where('status', '01')
    ->whereNull('po_type')
    ->count(); 
    return $approval;
  }
}

if (!function_exists('getAdminPayment')) {
  function getAdminPayment()
  {
    $payment = TrPo::where('status', '01')
    ->whereNull('po_type')
    ->count(); 
    return $payment;
  }
}

if (!function_exists('getAdminDp')) {
  function getAdminDp()
  {
    $dp = TrPo::where('status', '00')
    ->whereNull('po_type')
    ->count(); 
    return $dp;
  }
}

if (!function_exists('getAdminLp')) {
  function getAdminLp()
  {
    $lp = TrPo::where('status', '05')
    ->whereNull('po_type')
    ->count();
    return $lp;
  }
}

if (!function_exists('getAdminReady')) {
  function getAdminReady()
  {
    $ready = TrPo::where('status', '06')
    ->whereNull('po_type')
    ->count(); 
    return $ready;
  }
}

if (!function_exists('getAdminGoods')) {
  function getAdminGoods()
  {
    $ready = TrPo::whereIn('status', ['02', '03'])
    ->whereNull('po_type')
    ->count(); 
    return $ready;
  }
}




if (!function_exists('getAdminSgNew')) {
  function getAdminSgNew()
  {
    $new_sg = TrRequestOrder::where('status', '00')
    ->where('po_type', 'SG')
    ->count();
    return $new_sg;
  }
}

if (!function_exists('getAdminSgApproval')) {
  function getAdminSgApproval()
  {
    $approval_sg = TrRequestOrder::where('status', '01')
    ->where('po_type', 'SG')
    ->count(); 
    return $approval_sg;
  }
}

if (!function_exists('getAdminSgPayment')) {
  function getAdminSgPayment()
  {
    $payment_sg = TrPo::where('status', '01')
    ->where('po_type', 'SG')
    ->count(); 
    return $payment_sg;
  }
}

if (!function_exists('getAdminSgDp')) {
  function getAdminSgDp()
  {
    $dp_sg = TrPo::where('status', '00')
    ->where('po_type', 'SG')
    ->count(); 
    return $dp_sg;
  }
}

if (!function_exists('getAdminSgLp')) {
  function getAdminSgLp()
  {
    $lp_sg = TrPo::where('status', '05')
    ->where('po_type', 'SG')
    ->count(); 
    return $lp_sg;
  }
}

if (!function_exists('getAdminSgReady')) {
  function getAdminSgReady()
  {
    $ready_sg = TrPo::where('status', '06')
    // ->where('po_type', 'SD')
    ->count(); 

    return $ready_sg;
  }
}

if (!function_exists('getAdminSgGoods')) {
  function getAdminSgGoods()
  {
    $ready = TrPo::where('status', ['02', '03'])
    ->where('po_type', 'SG')
    ->count(); 
    return $ready;
  }
}

if (!function_exists('formatDate')) {
  function formatDate($date)
  {
    return date('d M Y', strtotime($date));
  }
}

if (!function_exists('formatDateTime')) {
  function formatDateTime($datetime)
  {
    return date('d M Y H:i:s', strtotime($datetime));
  }
}