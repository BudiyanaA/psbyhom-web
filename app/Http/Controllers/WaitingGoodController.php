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


    public function edit(Request $request)
    {
        
        return view('waitinggood.edit');     
    }


    public function updateBatch(Request $request)
    {
        $batch_no = $request->batch_no;
        $id = $request->id;

        TrPoDetail::where('PODtlUUID', $id)
        ->update(['batch_no' => $batch_no]);

        return response()->json(['success' => true]);
    }
    
    public function updateStatus(Request $request)
    {
        $id = $request->pk;
        $statusItem = $request->status;
        $qty = $request->incoming_qty;
        $harga = $request->price_customer;
        $subtotal_now = 0;
        if ($statusItem !== '02') {
            TrPoDtl::update([
                'incoming_qty' => $qty,
                'status' => $status_item,
                'subtotal' => $subtotal_now ($qty * $harga)
            ]);
            

                $subtotal = TrPoDtl::where('PODtlUUID', $id)->pluck('subtotal');
                $POUUID = TrPoDtl::where('PODtlUUID', $id)->pluck('POUUID');
                $subtotal_po = TrPo::where('POUUID',$POUUID)->pluck('POUUID');
                $grand_total = TrPo::where('POUUID',$POUUID)->pluck('total_trans');
                $total_outstanding  = TrPo::where('POUUID',$POUUID)->pluck('total_outstanding');
                if($subtotal_now != $subtotal || $subtotal == '0') 
				{
					$subtotal_po = $subtotal_po + $subtotal_now;
					$grand_total = $grand_total + $subtotal_now;
					$total_outstanding = $total_outstanding + $subtotal_now;
				}

                TrPo::update([
                        'subtotal' => $subtotal_po,
                        'total_trans' => $grand_total,
                        'total_outstanding' => $total_outstanding
                    ]);
            
        }
        if ($statusItem == '02') {
            TrPoDtl::where('PODtlUUID',$id)
            ->update([
                    'status' => $status_item,
					'incoming_qty' => '0',
					'subtotal' => '0'
            ]);
            $subtotal = TrPoDtl::where('PODtlUUID', $id)->pluck('subtotal');
            $POUUID = TrPoDtl::where('PODtlUUID', $id)->pluck('POUUID');
            $subtotal_po = TrPo::where('POUUID',$POUUID)->pluck('POUUID');
            $grand_total = TrPo::where('POUUID',$POUUID)->pluck('total_trans');
            $total_outstanding  = TrPo::where('POUUID',$POUUID)->pluck('total_outstanding');

            $subtotal_po = $subtotal_po - $subtotal;
            $grand_total = $grand_total - $subtotal;
            $total_outstanding = $total_outstanding - $subtotal;

            $refund_amount = 0;
				if($total_outstanding < 0)
				{
					$refund_amount = $total_outstanding;
				}

            TrPo::where('POUUID',$id)
            ->update([
                'subtotal' => $subtotal_po,
				'refund_amount' => $refund_amount,
				'total_trans' => $grand_total,
				'total_outstanding' => $total_outstanding
        ]);
        }
        $total = TrPoDtl::where('POUUID', $POUUID)
                 ->where(function ($query) {
                     $query->where('status', '00')
                           ->orWhere('status', '01');
                 })
                 ->count();

        $status_ok = TrPoDtl::where('POUUID', $POUUID)
                     ->where('status', '01')
                     ->count();

                     if ($total == 0 && $status_ok > 0) {
                        TrPo::where('POUUID', $POUUID)
                            ->update(['status' => '03']);
                    } else if ($total == 0 && $status_ok == 0) {
                        $total_refund = TrPayment::where('POUUID', $POUUID)
                                                  ->where('status', '01')
                                                  ->sum('payment_amount');
                        TrPo::where('POUUID', $POUUID)
                            ->update(['status' => '03', 'refund_amount' => $total_refund]);
                    } else if ($total != 0) {
                        TrPo::where('POUUID', $POUUID)
                            ->update(['status' => '02']);
                    }
        return response()->json(['success' => true]);
    }
}
