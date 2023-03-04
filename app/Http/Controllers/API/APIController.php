<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrInvoice;
use App\Models\TrPoDtl;
use App\Models\TrPo;
use App\Models\TrPayment;
use Illuminate\Support\Facades\DB;

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

    public function updateBatchOrder(Request $request)
    {
      try {
        TrPoDtl::where('PODtlUUID', $request->PODtlUUID)
          ->update([
            'batch_no' => $request->batch_no
          ]);

        return [
          "code" => 200,
          "success" => true,
        ];
      } catch(\Exception $e) {
        return [
          "code" => 500,
          "success" => false,
        ];
      }
    }

    public function updateStatusItem(Request $request)
    {
      DB::beginTransaction();
      try {
        $PODtlUUID = $request->PODtlUUID;
        $status_item = $request->status_item;
        $qty = $request->qty;
        $harga = $request->harga;
        $subtotal_now = $qty * $harga;
        
        if($status_item != '02')
        {
          TrPoDtl::where('PODtlUUID', $PODtlUUID)
            ->update([
              'incoming_qty' => $qty,
              'status' => $status_item,
              'subtotal' => $subtotal_now
            ]);
          
          $podtl = TrPoDtl::where('PODtlUUID', $PODtlUUID)->first();
          $subtotal = $podtl->subtotal;
          $POUUID = $podtl->POUUID;
          $po = TrPo::where('POUUID', $POUUID)->first();
          $subtotal_po = $po->subtotal;
          $grand_total = $po->total_trans;
          $total_outstanding = $po->total_outstanding;
          if($subtotal_now != $subtotal || $subtotal == '0') 
          {
            $subtotal_po = $subtotal_po + $subtotal_now;
            $grand_total = $grand_total + $subtotal_now;
            $total_outstanding = $total_outstanding + $subtotal_now;
          }
          TrPo::where('POUUID', $POUUID)
            ->update([
              'subtotal' => $subtotal_po,
              'total_trans' => $grand_total,
              'total_outstanding' => $total_outstanding	
            ]);
        }
        else if($status_item == '02')
        {	
          TrPoDtl::where('PODtlUUID', $PODtlUUID)
            ->update([
              'status' => $status_item,
              'incoming_qty' => '0',
              'subtotal' => '0'
            ]);

          $podtl = TrPoDtl::where('PODtlUUID', $PODtlUUID)->first();
          $subtotal = $podtl->subtotal;
          $POUUID = $podtl->POUUID;
          $po = TrPo::where('POUUID', $POUUID)->first();
          $subtotal_po = $po->subtotal;
          $grand_total = $po->total_trans;
          $total_outstanding = $po->total_outstanding;

          $subtotal_po = $subtotal_po - $subtotal;
          $grand_total = $grand_total - $subtotal;		
          $total_outstanding = $total_outstanding - $subtotal;

          $refund_amount = 0;
          if($total_outstanding < 0)
          {
            $refund_amount = $total_outstanding;
          }

          TrPo::where('POUUID', $POUUID)
            ->update([
              'subtotal' => $subtotal_po,
              'refund_amount' => $refund_amount,
              'total_trans' => $grand_total,
              'total_outstanding' => $total_outstanding	
            ]);
        }

        $total = TrPoDtl::where('POUUID', $POUUID)->where('status', '00')->count('POUUID');
        $status_ok = TrPoDtl::where('POUUID', $POUUID)->where('status', '01')->count('*');

        if($total == 0 && $status_ok > 0)
        {
          TrPo::where('POUUID', $POUUID)->update(['status' => '03']);
        }
        else if($total == 0 && $status_ok == 0)
        {
          $total_refund = TrPayment::where('POUUID', $POUUID)
            ->where('status', '01')->sum('payment_amount');
          TrPo::where('POUUID', $POUUID)
            ->update(['status' => '03', 'refund_amount' => $total_refund]);
        }
        else if($total != 0 )
        {;
          TrPo::where('POUUID', $POUUID)->update(['status' => '02']);
        }

        DB::commit();
        return [
          "code" => 200,
          "success" => true,
        ];

      } catch(\Exception $e) {
        DB::rollback();
        // dd($e);
        return [
          "code" => 500,
          "success" => false,
        ];
      }
    }

    public function updateKeterangan(Request $request)
    {
      DB::beginTransaction();
      try {
        $PODtlUUID = $request->PODtlUUID;
        $keterangan = $request->keterangan;

        TrPoDtl::where('PODtlUUID', $PODtlUUID)
          ->update([
            'keterangan' => $keterangan
          ]);
        
        DB::commit();
        return [
          "code" => 200,
          "success" => true,
        ];
      } catch(\Exception $e) {
        DB::rollback();
        // dd($e);
        return [
          "code" => 500,
          "success" => false,
        ];
      }
    }
}
