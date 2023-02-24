<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Processorder;
use App\Mail\PostEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\TrRequestOrderDtl;
use App\Models\TrRequestOrder;
use Illuminate\Support\Str;
use App\Models\RegisterCostumer;
use App\Models\TrPoDtl;
use App\Models\TrPo;
use App\Models\MsVoucher;
use App\Models\TrEwallet;
use App\Models\TrPayment;
use App\Models\LogTransaction;
use App\Models\LogActv;

class ProcesOrderController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
    //    
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'qty' => 'required|numeric|min:1',
            'subtotal' => 'required',
            'ongkir_type' => 'required',
            'receiver_name' => 'required',
            'receiver_address' => 'required',
        ]);
    try {
        
        $qty = (int)$validated['qty'];
        $seq = 1;
        $price_po = $validated['subtotal'] / $validated['qty'];
        $PODtlUUID = uniqid();
        $row= 'test' ;
        for ($i = 0; $i < $qty; $i++) {
            // create the TrPoDtl instance with the updated values
            TrPoDtl::create([
                'PODtlUUID' => $PODtlUUID,
                'POUUID' => $PODtlUUID,
                'RequestOrderDtlUUID' => $row,
                'qty' => $validated['qty'],
                'incoming_qty' => $validated['qty'],
                'price' => $price_po,
                'subtotal' => $validated['subtotal'],
                'status' => '00',
                'seq' => $seq,
                'refund_amount' => '0',
                'voucher' => isset($voucher) ? $voucher : 0,
                'insurance' => isset($insurance) ? $insurance : 0,
                'packing' => isset($packing) ? $packing : 0,
                'ewallet' => isset($ewallet) ? $ewallet : 0,
            ]);
            $wallet= uniqid();
            $e_wallet_value= 'test';
            $po_id = 'test';
            $ewallet = isset($ewallet) ? $ewallet : 0;
            if ($ewallet != 0) {
                TrEwallet::create([
                    'EWalletUUID' => $wallet,
                    'CustomerUUID' => $CustomerUUID,
                    'POUUID' => $POUUID,
                    'amount' => '-'.$e_wallet_value,
                    'trans_date' => date('Y-m-d H:i:s'),
                    'description' => 'Usage for PO ID: '.$po_id,
                ]);
            }

            $POUUID= uniqid();
            $CustomerUUID = session('user_id');
            $voucher = isset($voucher) ? $voucher : 0;
            if ($voucher != 0) {
                MsVoucher::where('VoucherUUID', $voucher)->update([
                    'POUUID' => $POUUID,
                    'status' => '01',
                    'ByUserUUID' => $CustomerUUID,
                    'ByUserIP' => $this->input->ip_address(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);
            }
            $use_ewallet = 1;
            $total_outstanding = 0;
            
            if(isset($use_ewallet) && isset($total_outstanding)) {
                if($use_ewallet == '1' && $total_outstanding =='0') {
                    $status_po = '00';
                    $status_ro = '02';
                    $total_paid = 100;
                    $dp_amount = $e_wallet_value;
                    $grand_total = $e_wallet_value;
                    $total_outstanding = "0";
                } else if($use_ewallet == '1' && $total_outstanding !='0') {
                    $total_paid = ($e_wallet_value / $grand_total) * 100;
                    $status_po = ($total_paid >= 50) ? '00' : '01';
                    $unique_amount = rand(10,99);
                    $dp_amount = $e_wallet_value;
                    $grand_total = $grand_total + $unique_amount;
                    $total_outstanding = $grand_total - $e_wallet_value;
                } else {
                    $total_paid = 0;
                    $unique_amount = rand(10,99);
                    $grand_total = $grand_total + $unique_amount;
                    $status_po = '01';
                    $total_outstanding = $grand_total;
                }
            } else {
                echo "Variabel tidak dideklarasikan.";
            }
            $BatchUUID = TrRequestOrder::where('RequestOrderUUID',  $request->id)->first();
            $uuid = Str::uuid()->toString();
            $ongkir = 2000;
            $insurance = 2000;
            $packing_value = 2000;
            $unique_amount = 5;
            $provinsi = 'Jawa Barat';
            $city = 'Garut';
            $kecamatan = 'Cilawu';
            TrPo::create([
                'POUUID' => $POUUID,
                'BatchUUID' => $BatchUUID,
                'RequestOrderUUID' => $uuid,
                'CustomerUUID' => $CustomerUUID,
                'po_id' => $po_id, 
                'trans_date' => date('Y-m-d H:i:s'),
                'created_by' => $CustomerUUID,
                'subtotal' =>  $request->subtotal,
                'ongkir' =>  $ongkir,
                'ongkir_type' =>$request->ongkir_type,
                'insurance' => $insurance,
                'block_package' => $packing_value,
                'unique_amount' => $unique_amount,
                'e_wallet_amount' => $e_wallet_value,
                'total_trans' => $grand_total,
                'receiver_name' => $request->receiver_name,
                'receiver_address' => $request->receiver_address,
                'receiver_province' =>$request->receiver_province,
                'receiver_city' => $request->receiver_city,
                'receiver_kecamatan' =>  $request->receiver_kecamatan,
                'receiver_hp1' => $request->receiver_hp1,
                'receiver_hp2' => $request->receiver_hp2,
                'receiver_kodepos' => $request->receiver_kodepos,
                'status' => $status_po,
                'is_dropshipper' => $request->is_dropshipper,
                'use_ewallet' => $use_ewallet,
                'total_paid' => $total_paid,
                'dp_amount' => '0',
                'total_outstanding' => $total_outstanding, 
                'notes' => $request->notes,
                'ByUserUUID' => $CustomerUUID,
                'additional_shipping_fee' => '0',
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s'),
                'total_seq' => $seq,
                'courier_name' =>$request->courier_name,
                'payment_dp' => '0',
                'address' => $request->address,
            ]);

            if ($status_po == '01' && $total_paid < 50) {
                // generate invoice UUID
                $InvoiceUUID = generateUUID();
            
                // insert data to tr_invoice table
                  TrInvoice::create([
                    'InvoiceUUID' => $InvoiceUUID,
                    'POUUID' => $POUUID,
                    'RequestOrderUUID' => $RequestOrderUUID,
                    'CustomerUUID' => $CustomerUUID,
                    'invoice_id' => $invoice_id, //($request_id.'/DP')
                    'invoice_date' =>  date('Y-m-d'),
                    'created_by' => $CustomerUUID,
                    'subtotal' => $subtotal_final,
                    'ongkir' => $ongkir,
                    'insurance' => $insurance_value,
                    'block_package' => $packing_value,
                    //'discount' => $voucher_value,
                    'e_wallet_amount' => $e_wallet_value,
                    //'payment_methode' => $payment,
                    'unique_amount' => $unique_amount,
                    'grand_total' => $total_outstanding,
                    'status_invoice' => $status_po,
                    'ByUserUUID' => $CustomerUUID,    
                    'ByUserIP' => $this->input->ip_address(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);
            }
            $InvoiceUUID = uniqid();
            $requestOrder = TrRequestOrder::where('RequestOrderUUID', $request->id)->update([
                'status' => '02',
                'POUUID' => $POUUID,
                'InvoiceUUID' => $InvoiceUUID,
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);
            if($status_po == '00' && $total_paid >= 50) {
                $PaymentUUID = uniqid();
                $invoice_id = uniqid();
                TrPayment::create([
                    'PaymentUUID' => $PaymentUUID,
                    'payment_id' => 'PAY/' . str_replace('INV/', '', $invoice_id) . '/1',
                    'POUUID' => $POUUID,
                    'BankUUID' => '3a1b9853-7790-11e9-8f37-7824af3a2381',
                    'created_date' => date('Y-m-d'),
                    'created_by' => $CustomerUUID,
                    'payment_amount' => $e_wallet_value,
                    'payment_date' => date('Y-m-d'),
                    'bank_source' => 'E-Wallet',
                    'account_no_source' => '-',
                    'account_name_source' => '-',
                    'remarks' => '',
                    'image_path' => '',
                    'status' => '00',
                    'ByUserUUID' => $CustomerUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);
                TrRequestOrder::where('RequestOrderUUID', $request->id)->update([
                    'status' => '03',
                    'POUUID' => $POUUID,
                    'InvoiceUUID' => $InvoiceUUID,
                    'ByUserUUID' => $CustomerUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);
            }
            $LogTransUUID = uniqid();
            LogTransaction::create([
                'LogTransUUID' => $LogTransUUID,
					'POUUID' => $POUUID,
					'log_date' => date('Y-m-d H:i:s'),
					'action_desc' => "Customer Submit Pre Order Transaction with PO ID : ".$po_id,
					'created_by' => $request->receiver_name,
					'UserUUID' =>  $CustomerUUID
            ]);
            $customer_name = session('customer_name');

            LogActv::create([
                'user_id' => $customer_name,
                'UserUUID' => $CustomerUUID,
                'menu_nm' => 'Submit Request Order',
                'log_time' => date('Y-m-d H:i:s'),
                'Description' => 'Submit Request Order : '.$po_id,
                'LogType' => 'Create',
                'user_type' => 'Customer',
                'RefUUID' => $CustomerUUID,
                'is_financial' => '1',
                'is_error' => '0',
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);
        
        }

        Mail::to("dederizki130102@gmail.com")->send(new PostEmail());

        return redirect(route('process_order.notification'))
            ->withSuccess("Data berhasil ditambahkan");

    } catch(\Exception $e) {
        dd($e);
        return redirect()->back()->withError('Data gagal ditambahkan');
    }
}

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['requestorder'] = TrRequestOrder::where('RequestOrderUUID', $id)->first();
        $data['preorders'] = TrRequestOrderDtl::where('RequestOrderUUID', $id)->orderBy('seq', 'asc')->get();
        $CustomerUUID = session('user_id');
        $data['costumer'] = Registercostumer::where('CustomerUUID', $CustomerUUID)->first();

        return view('processorder.index', $data);
    }
    public function update(Request $request, $id)
    {
        // 
    }
    public function notification()
    {
        return view('processorder.notification');
    }
}
