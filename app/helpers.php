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
    $new = TrRequestOrder::where('status', '00')->count(); 
    return $new;
  }
}

if (!function_exists('getAdminApproval')) {
  function getAdminApproval()
  {
    $approval = TrRequestOrder::where('status', '01')->count(); 
    return $approval;
  }
}

if (!function_exists('getAdminPayment')) {
  function getAdminPayment()
  {
    $payment = TrPo::where('status', '01')->count(); 
    return $payment;
  }
}

if (!function_exists('getAdminDp')) {
  function getAdminDp()
  {
    $dp = TrPo::where('status', '00')->count(); 
    return $dp;
  }
}

if (!function_exists('getAdminLp')) {
  function getAdminLp()
  {
    $lp = TrPo::where('status', '05')->count(); 
    return $lp;
  }
}

if (!function_exists('getAdminReady')) {
  function getAdminReady()
  {
    $ready = TrPo::where('status', '06')->count(); 
    return $ready;
  }
}

if (!function_exists('getAdminGoods')) {
  function getAdminGoods()
  {
    $ready = TrPo::where('status', ['02', '03'])->count(); 
    return $ready;
  }
}