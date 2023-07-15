<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrInvoice;
use App\Models\TrPoDtl;
use App\Models\TrPo;
use App\Models\TrPayment;
use App\Models\Registercostumer;
use App\Models\LogTransaction;
use App\Models\TrWithdrawal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResiEmail;

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
          "invoice" => $invoice,
      ];
    }

    public function updateBatchOrder(Request $request)
    {
      try {
        TrPoDtl::where('PODtlUUID', $request->PODtlUUID)
          ->update([
            'batch_no' => $request->batch_no ?? ""
          ]);

        return [
          "code" => 200,
          "success" => true,
        ];
      } catch(\Exception $e) {
        return [
          "code" => 500,
          "success" => $e,
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

        // Additional Status
        if (in_array($status_item, ["03", "04", "05", "06"])) {
          TrPoDtl::where('PODtlUUID', $PODtlUUID)
            ->update([
            'status' => $status_item,
          ]);

          DB::commit();
          return [
            "code" => 200,
            "success" => true,
          ];
        }
        
        if($status_item != '02')
        {
          $podtl = TrPoDtl::where('PODtlUUID', $PODtlUUID)->first();
          $POUUID = $podtl->POUUID;
          $po = TrPo::where('POUUID', $POUUID)->first();

          TrPoDtl::where('PODtlUUID', $PODtlUUID)
            ->update([
              'incoming_qty' => $qty,
              'status' => $status_item,
              'subtotal' => $subtotal_now
            ]);
          
          $subtotal = $podtl->subtotal;

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
          $podtl = TrPoDtl::where('PODtlUUID', $PODtlUUID)->first();
          $POUUID = $podtl->POUUID;
          $po = TrPo::where('POUUID', $POUUID)->first();

          TrPoDtl::where('PODtlUUID', $PODtlUUID)
            ->update([
              'status' => $status_item,
              'incoming_qty' => '0',
              'subtotal' => '0'
            ]);

          $subtotal = $podtl->subtotal;
          
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
        dd($e);
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

    public function updateNoResi(Request $request)
    {
      DB::beginTransaction();
      try {

      //   TrPo::where('POUUID', $id)->update([
      //     'notes' => $request->note ?? "",
      // ]);
        // Send Email Notification
        $EmailUUID = 'ce7926a7-126b-474c-b6d8-cdab04f96d88'; //No Resi Notification
        $email_customer = $request->customer_email;
        $POUUID = $request->POUUID;

        $po = TrPo::where('POUUID', $POUUID)->first();
        $customer = Registercostumer::where('CustomerUUID', $po->CustomerUUID)->first();

        $emailsent = Mail::to($email_customer)
            ->send(new ResiEmail(
                $po->po_id, 
                $customer->customer_name,
                $po->receiver_address,
                $POUUID, 
                $EmailUUID,
                $request->no_resi,
            ));
        
        TrPo::where('POUUID', $POUUID)->update([
          'status' => '07',
					'no_resi' => $request->no_resi,
	'OnDateTime' => date('Y-m-d H:i:s'),				
        ]);

        LogTransaction::create([
          'LogTransUUID' => $this->newid(),
          'POUUID' => $POUUID,
          'log_date' => date('Y-m-d H:i:s'),
          'action_desc' => "Admin input No Resi : ".$request->no_resi,
          'created_by' => 'Admin',
          'UserUUID' => $request->admin, 
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

    public function updateStatusWithdrawal(Request $request) {
      DB::beginTransaction();
      try {
        TrWithdrawal::where('withdrawUUID', $request->withdrawUUID)
          ->update([
            'status' => $request->status,
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
