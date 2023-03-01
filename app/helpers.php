<?php

use App\Models\TrEwallet;

if (!function_exists('getUserEwallet')) {
  function getUserEwallet()
  {
    $CustomerUUID = session('user_id');
    $ewallet = TrEwallet::where('CustomerUUID', $CustomerUUID)->sum('amount');
    return $ewallet;
  }
}