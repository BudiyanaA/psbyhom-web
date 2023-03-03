<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrInvoice;

class APIController extends Controller
{
    public function invoiceAmount(Request $request, $InvoiceUUID)
    {
      $amount = 0;
      $invoice = TrInvoice::where('InvoiceUUID', $InvoiceUUID)->first();
      $amount = $invoice->grand_total;

      if ($amount == '0') {
        $amount = $invoice->total_outstanding;
      }

      return [
          "code" => 200,
          "amount" => $amount,
      ];
    }
}
