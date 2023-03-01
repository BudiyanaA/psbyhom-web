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


    public function edit(Request $request, $id)
    {
        $data['waitinggoods'] = TrPo::with('trRequestOrder', 'msStatus', 'msCustomer')
                                    ->where('POUUID', '!=', 'ms_status.type')
                                    ->first();
        $data['podetails'] = TrPoDtl::where('POUUID', $id)
                            ->with(['request_order_detail' => function ($query) {
                                $query->orderBy('seq', 'ASC');
                            }])
                            ->get();
        $data['payment'] = TrPayment::with(['po', 'bank'])
                            ->where('POUUID', $id)
                            ->orderBy('created_date', 'ASC')
                            ->get();
        $data['logtrans'] = Logtransaction::where('POUUID', $id)
                            ->orderBy('log_date ', 'DESC')
                            ->get();           
        return view('waitinggood.edit',$data);     
    }

    function newid()
		{
			$uuid = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			mt_rand( 0, 0x0fff ) | 0x4000,
			mt_rand( 0, 0x3fff ) | 0x8000,
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
			return $uuid;
		}

    public function update(Request $request, $id)
    {
        $AdminUUID = session('admin_id');
        $username = session('admin_name');
        try {
            $status_ok = TrPoDtl::where('POUUID', $id)
                ->where('status', '01')
                ->count();
                if ($total_outstanding <= 0 && $total_super_grandtotal != 0 && $status_ok > 0) {
                    $status = '06';
                } else if ($total_outstanding <= 0 && $total_super_grandtotal == 0 && $total_reject > 0) {
                    $status = '09';
                } else if ($status_ok == 0) {
                    $status = '09';
                } else if ($total_super_grandtotal == 0 && $total_reject == 0 && $status_ok > 0) {
                    $status = '06';
                } else {
                    $status = '04';
                }
                TrPo::where('POUUID', $id)
                    ->update([
                        'additional_shipping_fee' => $request->additional_shipping_fee,
                        'ongkir' => $request->ongkir_type,
                        'insurance' => $request->insurance,
                        'block_package' => $request->block_package,
                        'total_outstanding' => $total_outstanding,
                        'total_trans' => $request->total_trans,
                        'refund_amount' => $request->refund_amount,
                        'subtotal' => $request->subtotal,
                        'status' => $request->status,
                        'ByUserUUID' => $AdminUUID,
                        'ByUserIP' =>$request->ip(),
                        'OnDateTime' => date('Y-m-d H:i:s')
                     ]);  
                     if ($total_outstanding <='0' && $total_super_grandtotal != 0) {
                        $status = '06';
                    } else if ($total_outstanding <='0' && $total_super_grandtotal == 0) {
                        $status = '09';
                    } else {
                        TrInvoice::create([
                            'InvoiceUUID' => $this->newid(),
                            'POUUID' => $id,
                            'RequestOrderUUID' => $request->RequestOrderUUID,
                            'CustomerUUID' => $request->CustomerUUID,
                            'invoice_id' => $request->po_id,
                            'invoice_date' =>  date('Y-m-d'),
                            'created_by' => $request->$CustomerUUID,
                            'subtotal' => '0',
                            'ongkir' => '0',
                            'insurance' => '0',
                            'block_package' => '0',
                            'discount' => '0',
                            'additional_package' => $request->additional_package,
                            'e_wallet_amount' => '0',
                            'payment_methode' => '0',
                            'unique_amount' => '0',
                            'grand_total' => '0',
                            'status_invoice' => '01',
                            'additional_fee' => $request->additional_fee,
                            'additional_delivery_fee' => $request->additional_ongkir,
                            'total_outstanding' => $total_outstanding,
                            'ByUserUUID' => $username,
                            'ByUserIP' => $request->ip(),
                            'OnDateTime' => date('Y-m-d H:i:s')
                        ]);
                        $email_notif = SysParam::where('sys_id', 'SYS_PARAM_43')->first();
                        $po_id = $request->request_id;
                        $emailUUID = '6ebb641b-4028-40fd-b1b2-78fada074132';
                        $email = MsEmail::where('EmailUUID', $emailUUID)->first();
                        $email_content = $email->email_content;
                        $email_content = str_replace('$po_id', $po_id, $email_content);
                        $email_content = str_replace('$customer_name', $customer->customer_name, $email_content);
                        $email_content_bottom = $email->email_content_bottom;
                        $delivery_address = $request->delivery_address;
                        $order_dtl = TrRequestOrderDtl::where('RequestOrderUUID', $id)
                        ->orderBy('seq', 'ASC')->get();

                        $emailsent = Mail::to($customer->email)
                        ->send(new InvoiceEmail(
                            $po_id,
                            $delivery_address,
                            $order_dtl, 
                            $email_content, 
                            $email_content_bottom, 
                            $email_notif->value_1));

                            if (!($emailsent instanceof \Illuminate\Mail\SentMessage)) {
                                return redirect()->back()->with('error', 'Gagal mengirim email!');
                            }
                            $order =TrPoDtl::where('PODtlUUID ', $id);
                            foreach($order as $id) {
                                TrPoDtl::where('PODtlUUID', $id)
                                       ->update([
                                           'incoming_qty' => $request->incoming_qty,
                                           'subtotal' => $request->subtotal
                                       ]);
                            }
                            if ($total_refund != '0' && $total_refund != '') {
                                LogTransaction::update([
                                    'LogTransUUID' => $this->newid(),
                                    'POUUID' => $id,
                                    'log_date' => date('Y-m-d H:i:s'),
                                    'action_desc' => "Refund to E-Wallet with total amount of ".number_format($total_refund),
                                    'created_by' => 'Admin',
                                    'UserUUID' => $AdminUUID
                                    ]);
                                    TrEwallet::create([
                                        'EWalletUUID' => $this->newid(),
                                        'CustomerUUID' => $request->CustomerUUID,
                                        'POUUID' => $id,
                                        'trans_date' => date('Y-m-d H:i:s'),
                                        'amount' => $total_refund,
                                        'description' => 'Process Refund to E-Wallet with total amount of : </b>'.number_format($total_refund).' from PO '.$request->po_id
                                    ]);
                                    TrPo::where('POUUID', $id)
                                    ->update([
                                        'refund_flag' => '11',
                                        'ongkir' => '0',
                                        'insurance' => '0',
                                        'block_package' => '0'
                                    ]);
                                    $email_notif = SysParam::where('sys_id', 'SYS_PARAM_43')->first();
                        $po_id = $request->request_id;
                        $emailUUID = 'd5dac8ca-f68d-4122-9b18-da8de83f93f2';
                        $email = MsEmail::where('EmailUUID', $emailUUID)->first();
                        $email_content = $email->email_content;
                        $email_content = str_replace('$po_id', $po_id, $email_content);
                        $email_content = str_replace('$customer_name', $customer->customer_name, $email_content);
                        $email_content_bottom = $email->email_content_bottom;
                        $total_refund = $request->total_refund;
                        $order_dtl = TrRequestOrderDtl::where('RequestOrderUUID', $id)
                        ->orderBy('seq', 'ASC')->get();

                        $emailsent = Mail::to($customer->email)
                        ->send(new RefundEmail(
                            $po_id,
                            $total_refund,
                            $order_dtl, 
                            $email_content, 
                            $email_content_bottom, 
                            $email_notif->value_1));
                            }
                            LogTransaction::create([
                                'LogTransUUID' => $this->newid(),
                                'POUUID' => $id,
                                'log_date' => date('Y-m-d H:i:s'),
                                'action_desc' => "Admin process the order",
                                'created_by' => 'Admin',
                                'UserUUID' => $AdminUUID
                            ]);
                            LogActv::create([
                                'id' => $this->newid(), //generate
                                'user_id' => $username, //login
                                'UserUUID' => $AdminUUID, //login
                                'menu_nm' => 'Process Order',
                                'log_time' => date('Y-m-d H:i:s'),
                                'Description' => '<b>Admin Process Order '.$request->po_id,
                                'LogType' => 'Insert',
                                'user_type' => 'Admin',
                                'RefUUID' => $id,
                                'is_financial' => '0',
                                'is_error' => '0',
                                'ByUserUUID' => $AdminUUID,
                                'ByUserIP' => $request->ip(),
                                'OnDateTime' => date('Y-m-d H:i:s')
                            ]);
                    }
    
            return redirect(route('waitinggood.notification'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal diubah');
        }
    }
    public function notification()
    {
        return view('waitinggood.notification');
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
