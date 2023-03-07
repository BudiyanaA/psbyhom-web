<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrPo;
use App\Models\TrPoDtl;
use App\Models\TrPayment;
use App\Models\LogTransaction;
use App\Models\TrInvoice;
use App\Models\LogActv;
use App\Models\Registercostumer;
use App\Models\TrEwallet;
use App\Mail\VerifiedPaymentEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\InvoiceLPEmail;
use App\Mail\RefundEmail;
use App\Mail\ResiEmail;

class WaitingGoodController extends Controller
{
    public function index()
    {
        $data['waitinggoods'] = TrPo::whereIn('status', ['02', '03'])
            ->with(['msCustomer', 'poDtls', 'poDtls.requestOrderDtl'])
            ->with('poDtls', function ($query) {
                $query->orderBy('seq', 'ASC');
            })
            ->orderBy('verify_payment_date', 'DESC')
            ->get();

        return view('waitinggood.index',$data);
    }


    public function edit(Request $request, $id)
    {
        $data['po'] = TrPo::with(['trRequestOrder', 'msStatus', 'msCustomer'])
            ->where('POUUID', $id)
            ->whereHas('msStatus', function ($query) {
                $query->where('type', '!=', 'RO');
            })
            ->first();
        $data['payment'] = TrPayment::with(['po', 'bank'])
            ->where('POUUID', $id)
            ->orderBy('created_date', 'ASC')
            ->get();

        $data['podetails'] = TrPoDtl::where('POUUID', $id)
            ->with('requestOrderDtl')
            ->orderBy('seq', 'ASC')
            ->get();

        $data['logtrans'] = LogTransaction::where('POUUID', $id)
            ->orderBy('log_date', 'DESC')
            ->get();

        return view('waitinggood.edit',$data);     
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $AdminUUID = session('admin_id');
        $username = session('admin_name');

        DB::beginTransaction();
        try {
            // $submit = $this->input->post('submit');
            $CustomerUUID = $request->CustomerUUID;
            $total_outstanding = $request->total_outstanding;
            $total_super_grandtotal = $request->super_grand_total;
            $total_refund = abs($request->total_refund);
            $total_subtotal = $request->sub_grand_total;
            $total_row = $request->total_row;
            $additional_shipping_fee = $request->additional_shipping_fee;
            $ongkir = $request->delivery_fee;
            $insurance = $request->insurance_fee;
            $block_package = $request->block_package_fee;   

			$PaymentUUID = $request->PaymentUUID;
			$payment_amount = $request->payment_amount;

            if ($request->submit == 'verify') {
                TrPayment::where('PaymentUUID', $PaymentUUID)->update([
                    'payment_amount' => $payment_amount,
                    'status' => '01',
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                $invoice = TrInvoice::where('POUUID', $id)->where('status_invoice', '02')
                    ->first();
                if ($invoice) {
                    TrInvoice::where('InvoiceUUID', $invoice->InvoiceUUID)
                        ->update([
                            'status_invoice' => '03',
					        'ByUserUUID' => $AdminUUID,
					        'ByUserIP' => $request->ip(),
					        'OnDateTime' => date('Y-m-d H:i:s')
                        ]);
                }

                $po = TrPo::where('POUUID', $id)->first();
                // dd($po);
                $check_use_ewallet = $po->use_ewallet;
                $super_grand_total = $request->super_grand_total;
                if ($check_use_ewallet == 1) {
                	$dp_amount =  $po->e_wallet_amount;
                	if ($payment_amount == $dp_amount) {
                        $payment_amount = 0;
                    }
                } else {
                    $dp_amount = 0;
                }
                $dp_amount = $dp_amount + $payment_amount;
                $total_paid_percentage = round((intval($dp_amount) / intval($super_grand_total)) * 100);
                $total_outstanding = $super_grand_total - $dp_amount;
                TrPo::where('POUUID', $id)->update([
                    //'BatchUUID' => $this->input->post('batch_id'),
                    'dp_amount' => $dp_amount,
                    'payment_dp' => $payment_amount,
                    'total_paid' => $total_paid_percentage,
				    'total_outstanding' => $total_outstanding,
				    'verify_payment_date' => date('Y-m-d H:i:s'),
		            'status' => '02',
	        	    'ByUserUUID' => $AdminUUID,
				    'ByUserIP' => $request->ip(),
				    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                LogActv::create([
                    'id' => $this->newid(),
                    'user_id' => $username,
                    'UserUUID' => $AdminUUID,
                    'menu_nm' => 'Verify Payment',
                    'log_time' => date('Y-m-d H:i:s'),
                    'Description' => '<b>Verify Payment PO : </b>'.$request->payment_id,
                    'LogType' => 'Insert',
                    'user_type' => 'Admin',
                    'RefUUID' => $PaymentUUID,
                    'is_financial' => '0',
                    'is_error' => '0',
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                LogTransaction::create([
                    'LogTransUUID' => $this->newid(),
                    'POUUID' => $id,
                    'log_date' => date('Y-m-d H:i:s'),
                    'action_desc' => "Admin Verify Payment ID : ".$request->payment_id,
                    'created_by' => 'Admin',
                    'UserUUID' => $AdminUUID
                ]);

                // Send Email Notif to Customer
                $EmailUUID = '609cd8c1-eb0b-4256-b2c6-e0942abd234e'; // Verified Payment Notification
                $email_customer = Registercostumer::where('CustomerUUID', $request->CustomerUUID)->first()->email;
                $emailsent = Mail::to($email_customer)->send(new VerifiedPaymentEmail(
                    $request->po_id, $request->customer_name, $payment_amount, $EmailUUID
                ));
                if (!($emailsent instanceof \Illuminate\Mail\SentMessage)) {
                    return redirect()->back()->with('error', 'Gagal mengirim email!');
                }

                DB::commit();
                return redirect(route('waitinggood.notification', $id))
                    ->withSuccess("Data berhasil diubah");
            } else if ($request->submit == 'cancel') {
                $invoice = TrInvoice::where('POUUID', $id)->where('status_invoice', '02')
                    ->first();
                TrInvoice::where('InvoiceUUID', $invoice->InvoiceUUID)
                    ->update([
                        'status_invoice' => '01',
                        'ByUserUUID' => $AdminUUID,
                        'ByUserIP' => $request->ip(),
                        'OnDateTime' => date('Y-m-d H:i:s')
                    ]);
                
                TrPo::where('POUUID', $id)->update([
                    'status' => '03',
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                TrPayment::where('PaymentUUID', $PaymentUUID)->update([
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                LogActv::create([
                    'id' => $this->newid(),
                    'user_id' => $username,
                    'UserUUID' => $AdminUUID,
                    'menu_nm' => 'Verify Payment',
                    'log_time' => date('Y-m-d H:i:s'),
                    'Description' => '<b>Verify Payment PO : </b>'.$request->payment_id,
                    'LogType' => 'Insert',
                    'user_type' => 'Admin',
                    'RefUUID' => $PaymentUUID,
                    'is_financial' => '0',
                    'is_error' => '0',
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                LogTransaction::create([
                    'LogTransUUID' => $this->newid(),
                    'POUUID' => $id,
                    'log_date' => date('Y-m-d H:i:s'),
                    'action_desc' => "Admin Verify Payment ID : ".$request->payment_id,
                    'created_by' => 'Admin',
                    'UserUUID' => $AdminUUID
                ]);

                // Send Email Notif to Customer
                $EmailUUID = 'c40d3bd4-cd6c-4915-a76f-25c3c7d459a7'; //Invalid Payment Notification
                $email_customer = Registercostumer::where('CustomerUUID', $request->CustomerUUID)->first()->email;
                $emailsent = Mail::to($email_customer)->send(new VerifiedPaymentEmail(
                    $request->po_id, $request->customer_name, $payment_amount, $EmailUUID
                ));
                if (!($emailsent instanceof \Illuminate\Mail\SentMessage)) {
                    return redirect()->back()->with('error', 'Gagal mengirim email!');
                }
                
                DB::commit();
                return redirect(route('waitinggood.notification', $id))
                    ->withSuccess("Data berhasil diubah");
            } else if ($request->submit == 'prepare_delivery') {
                $status_ok = TrPoDtl::where('POUUID', $id)
                    ->where('status', '01')
                    ->count('*');
                $total_reject = $request->total_rejects;

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
                        'additional_shipping_fee' => $additional_shipping_fee,
                        'ongkir' => $ongkir,
                        'insurance' => $insurance,
                        'block_package' => $block_package,
                        'total_outstanding' => $total_outstanding,
                        'total_trans' => $total_super_grandtotal,
                        'refund_amount' => $total_refund,
                        'subtotal' => $total_subtotal,
                        'status' => $status,
                        'ByUserUUID' => $AdminUUID,
                        'ByUserIP' =>$request->ip(),
                        'OnDateTime' => date('Y-m-d H:i:s')
                    ]);
                
                if ($total_outstanding <='0' && $total_super_grandtotal != 0) {
                    $status = '06';
                } else if ($total_outstanding <='0' && $total_super_grandtotal == 0) {
                    $status = '09';
                } else {
                    $status = '04';
                    $invoice_id = $request->po_id.'/LP';
                    TrInvoice::create([
                        'InvoiceUUID' => $this->newid(),
                        'POUUID' => $id,
                        'RequestOrderUUID' => $request->RequestOrderUUID,
                        'CustomerUUID' => $CustomerUUID,
                        'invoice_id' => $invoice_id,
                        'invoice_date' =>  date('Y-m-d'),
                        'created_by' => $CustomerUUID,
                        'subtotal' => '0',
                        'ongkir' => '0',
                        'insurance' => '0',
                        'block_package' => '0',
                        'discount' => '0',
                        // 'additional_package' => $request->additional_package,
                        'additional_package' => '0',
                        'e_wallet_amount' => '0',
                        'payment_methode' => '0',
                        'unique_amount' => '0',
                        'grand_total' => '0',
                        'status_invoice' => '01',
                        // 'additional_fee' => $request->additional_fee,
                        'additional_fee' => '0',
                        // 'additional_delivery_fee' => $request->additional_ongkir,
                        'additional_delivery_fee' => '0',
                        'total_outstanding' => $total_outstanding,
                        'ByUserUUID' => $CustomerUUID,
                        'ByUserIP' => $request->ip(),
                        'OnDateTime' => date('Y-m-d H:i:s')
                    ]);

                    // Send Email Notification        
                    $EmailUUID = '6ebb641b-4028-40fd-b1b2-78fada074132'; // Invoice PO for Last Payment
                    $email_customer = Registercostumer::where('CustomerUUID', $CustomerUUID)->first()->email;
                    $emailsent = Mail::to($email_customer)->send(new InvoiceLPEmail(
                        $request->po_id, 
                        $request->customer_name, 
                        $request->delivery_address, 
                        $id, 
                        $EmailUUID
                    ));
                    if (!($emailsent instanceof \Illuminate\Mail\SentMessage)) {
                        return redirect()->back()->with('error', 'Gagal mengirim email!');
                    }
                }

                for($i = 0; $i < $total_row; $i++)
				{
                    TrPoDtl::where('PODtlUUID', $request->PODtlUUID[$i])
                        ->update([
                            'incoming_qty' => $request->incoming_qty[$i],
                            'subtotal' => $request->subtotal_po[$i]
                        ]);
				}

                if ($total_refund != '0' && $total_refund != '') {
                    LogTransaction::create([
                        'LogTransUUID' => $this->newid(),
                        'POUUID' => $id,
                        'log_date' => date('Y-m-d H:i:s'),
                        'action_desc' => "Refund to E-Wallet with total amount of ".number_format($total_refund),
                        'created_by' => 'Admin',
                        'UserUUID' => $AdminUUID
                    ]);

                    TrEwallet::create([
                        'EWalletUUID' => $this->newid(),
                        'CustomerUUID' => $CustomerUUID,
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


                    $EmailUUID = 'd5dac8ca-f68d-4122-9b18-da8de83f93f2'; //Refund Notification
                    $email_customer = Registercostumer::where('CustomerUUID', $CustomerUUID)->first()->email;
                    $emailsent = Mail::to($email_customer)
                        ->send(new RefundEmail(
                            $request->po_id, 
                            $request->customer_name,
                            $request->delivery_address,
                            $id, 
                            $EmailUUID
                        ));
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
                    'id' => $this->newid(),
                    'user_id' => $username,
                    'UserUUID' => $AdminUUID,
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

                DB::commit();
                return redirect(route('waitinggood.notification', $id))
                    ->withSuccess("Data berhasil diubah");
            } else if ($request->submit == 'verify_last') {
                TrPo::where('POUUID', $id)->update([
                    'total_outstanding' => '0',
					'total_paid' => '100',
					'payment_last' => $payment_amount,
					'status' => '06',
					'ByUserUUID' => $AdminUUID,
					'ByUserIP' => $request->ip(),
					'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                TrPayment::where('PaymentUUID', $PaymentUUID)->update([
                    'status' => '01',
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                $invoice = TrInvoice::where('POUUID', $id)->where('status_invoice', '02')
                    ->first();
                TrInvoice::where('InvoiceUUID', $invoice->InvoiceUUID)
                    ->update([
                        'status_invoice' => '03',
                        'ByUserUUID' => $AdminUUID,
                        'ByUserIP' => $request->ip(),
                        'OnDateTime' => date('Y-m-d H:i:s')
                    ]);
                
                LogActv::create([
                    'id' => $this->newid(),
                    'user_id' => $username,
                    'UserUUID' => $AdminUUID,
                    'menu_nm' => 'Process Order',
                    'log_time' => date('Y-m-d H:i:s'),
                    'Description' => '<b>Admin Process Order '.$request->po_id,
                    'LogType' => 'Insert',
                    'user_type' => 'Admin',
                    'RefUUID' => $PaymentUUID,
                    'is_financial' => '0',
                    'is_error' => '0',
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                LogTransaction::create([
                    'LogTransUUID' => $this->newid(),
                    'POUUID' => $id,
                    'log_date' => date('Y-m-d H:i:s'),
                    'action_desc' => "Admin Verify Payment ID : ".$request->payment_id,
                    'created_by' => 'Admin',
                    'UserUUID' => $AdminUUID
                ]);

                // Send Email Notif to Customer
                $EmailUUID = '609cd8c1-eb0b-4256-b2c6-e0942abd234e'; // Verified Payment Notification
                $email_customer = Registercostumer::where('CustomerUUID', $request->CustomerUUID)->first()->email;
                $emailsent = Mail::to($email_customer)->send(new VerifiedPaymentEmail(
                    $request->po_id, $request->customer_name, $payment_amount, $EmailUUID
                ));
                if (!($emailsent instanceof \Illuminate\Mail\SentMessage)) {
                    return redirect()->back()->with('error', 'Gagal mengirim email!');
                }
                
                DB::commit();
                return redirect(route('waitinggood.notification', $id))
                    ->withSuccess("Data berhasil diubah");
            } else if ($request->submit == 'cancel_last') {
                TrPo::where('POUUID', $id)->update([
					'status' => '08',
					'ByUserUUID' => $AdminUUID,
					'ByUserIP' => $request->ip(),
					'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                TrPayment::where('PaymentUUID', $PaymentUUID)->update([
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                LogActv::create([
                    'id' => $this->newid(),
                    'user_id' => $username,
                    'UserUUID' => $AdminUUID,
                    'menu_nm' => 'Reject Last Payment Confirmation',
                    'log_time' => date('Y-m-d H:i:s'),
                    'Description' => '<b>Reject Payment PO : </b>'.$request->payment_id,
                    'LogType' => 'Insert',
                    'user_type' => 'Admin',
                    'RefUUID' => $PaymentUUID,
                    'is_financial' => '0',
                    'is_error' => '0',
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                LogTransaction::create([
                    'LogTransUUID' => $this->newid(),
                    'POUUID' => $id,
                    'log_date' => date('Y-m-d H:i:s'),
                    'action_desc' => "Admin Reject Payment ID : ".$request->payment_id,
                    'created_by' => 'Admin',
                    'UserUUID' => $AdminUUID
                ]);

                // Send Email Notif to Customer
                // $EmailUUID = '609cd8c1-eb0b-4256-b2c6-e0942abd234e'; // Verified Payment Notification
                // $email_customer = Registercostumer::where('CustomerUUID', $request->CustomerUUID)->first()->email;
                // $emailsent = Mail::to($email_customer)->send(new VerifiedPaymentEmail(
                //     $request->po_id, $request->customer_name, $payment_amount, $EmailUUID
                // ));
                // if (!($emailsent instanceof \Illuminate\Mail\SentMessage)) {
                //     return redirect()->back()->with('error', 'Gagal mengirim email!');
                // }
                
                DB::commit();
                return redirect(route('waitinggood.notification', $id))
                    ->withSuccess("Data berhasil diubah");
            } else if ($request->submit == 'update_no_resi') {
                TrPo::where('POUUID', $id)->update([
					'status' => '07',
					'no_resi' => $request->no_resi,
					'ByUserUUID' => $AdminUUID,
					'ByUserIP' => $request->ip(),
					'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                LogActv::create([
                    'id' => $this->newid(),
                    'user_id' => $username,
                    'UserUUID' => $AdminUUID,
                    'menu_nm' => 'Input no Resi',
                    'log_time' => date('Y-m-d H:i:s'),
                    'Description' => '<b>Input no resi for : </b>'.$request->po_id,
                    'LogType' => 'Insert',
                    'user_type' => 'Admin',
                    'RefUUID' => $id,
                    'is_financial' => '0',
                    'is_error' => '0',
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                LogTransaction::create([
                    'LogTransUUID' => $this->newid(),
                    'POUUID' => $id,
                    'log_date' => date('Y-m-d H:i:s'),
                    // 'action_desc' => "Admin input No Resi JNE : ".$request->no_resi,
                    'action_desc' => "Admin input No Resi : ".$request->no_resi,
                    'created_by' => 'Admin',
                    'UserUUID' => $AdminUUID
                ]);

                // Send Email Notification
                $EmailUUID = 'ce7926a7-126b-474c-b6d8-cdab04f96d88'; //No Resi Notification
                $email_customer = Registercostumer::where('CustomerUUID', $request->CustomerUUID)->first()->email;

                $po = TrPo::where('POUUID', $id)->first();
                $customer = Registercostumer::where('CustomerUUID', $po->CustomerUUID)->first();

                $emailsent = Mail::to($email_customer)
                    ->send(new ResiEmail(
                        $po->po_id, 
                        $customer->customer_name,
                        $po->receiver_address,
                        $id, 
                        $EmailUUID,
                        $request->no_resi,
                    ));
                
                DB::commit();
                return redirect(route('waitinggood.notification', $id))
                    ->withSuccess("Data berhasil diubah");
            }

        } catch(\Exception $e) {
            DB::rollback();
            // dd($e);
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
