<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Processorder;
use App\Mail\InvoiceDPEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\TrRequestOrderDtl;
use App\Models\TrRequestOrder;
use Illuminate\Support\Str;
use App\Models\Registercostumer;
use App\Models\TrPoDtl;
use App\Models\TrPo;
use App\Models\MsVoucher;
use App\Models\TrEwallet;
use App\Models\TrPayment;
use App\Models\LogTransaction;
use App\Models\LogActv;
use App\Models\SysParam;
use App\Models\MsBank;
use App\Models\TrInvoice;


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
        // dd($request->all());
        // $validated = $request->validate([
        //     'qty' => 'required|numeric|min:1',
        //     'subtotal' => 'required',
        //     'ongkir_type' => 'required',
        //     'receiver_name' => 'required',
        //     'receiver_address' => 'required',
        // ]);
        DB::beginTransaction();
    try {
        $POUUID = $this->newid();
        $RequestOrderUUID =  $request->RequestOrderUUID;
        $CustomerUUID = session('user_id');
        $po_id = $request->request_id;

        $ro_dtl = TrRequestOrderDtl::where('RequestOrderUUID', $RequestOrderUUID)
            ->orderBy('seq', 'ASC')->get();
        $subtotal_final = 0;
        $seq = 0;
        foreach($ro_dtl as $row)
		{
			$qty_po = $request->qty[$row->RequestOrderDtlUUID];
			if($qty_po != '0' && $qty_po != '')
			{
				$price_po = $row->subtotal_final / $row->qty;
				$subtotal_po = $qty_po * $price_po;
				$subtotal_final = $subtotal_final + $subtotal_po;
				TrPoDtl::create([
				    'PODtlUUID' => $this->newid(),
				    'POUUID' => $POUUID,
				    'RequestOrderDtlUUID' => $row->RequestOrderDtlUUID,
				    'qty' => $qty_po, 
				    'incoming_qty' => $qty_po,
				    'price' => $price_po,
				    'subtotal' => $subtotal_po,
				    'status' => '00',
				    'seq' => $seq,
				    'refund_amount' => '0',

                    'batch_no' => "",
                    'keterangan' => "",
                ]);
				$seq++;
			}
		}

        // if($request->voucher_value == '') $voucher_value = 0;
        $insurance_value = $request->insurance_value;
        $packing_value = $request->result_packing; 
        if($insurance_value == '' || $insurance_value == '0') 
            $insurance_value = 0;
        if($packing_value == '' || $packing_value == '0') 
            $packing_value = 0;

        $e_wallet_value = $request->ewallet_value;
        if($e_wallet_value == '' || $e_wallet_value == '0') {
            $e_wallet_value = 0;
        } else {
            TrEwallet::create([
                'EWalletUUID' => $this->newid(),
                'CustomerUUID' => $CustomerUUID,
                'POUUID' => $POUUID,
                'amount' => '-'.$e_wallet_value,
                'trans_date' => date('Y-m-d H:i:s'),
                'description' => 'Usage for PO ID: '.$po_id,
            ]);
        }

        // $VoucherUUID = $request->VoucherUUID;
        // if($VoucherUUID != '')
        // {
        //     MsVoucher::where('VoucherUUID', $VoucherUUID)->update([
        //         'POUUID' => $POUUID,
        //         'status' => '01',
        //         'ByUserUUID' => $CustomerUUID,
        //         'ByUserIP' => $request->ip(),
        //         'OnDateTime' => date('Y-m-d H:i:s')
        //     ]);
        // }

        $use_ewallet = $request->use_ewallet ?? 0;
        $total_outstanding = $request->total_outstanding;
        // $grand_total = $request->total_amount;
        $grand_total = $request->grand_total_summary;

        if($use_ewallet == '1' && $total_outstanding =='0') {
            $status_po = '00';
            $status_ro = '02';
            $total_paid = 100;
            $unique_amount = 0;
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

        $BatchUUID = TrRequestOrder::where('RequestOrderUUID', $RequestOrderUUID)->first()->BatchUUID;
        $ongkir = $request->delivery_fee_id_summary;
        $paket_kirim = $request->delivery_fee_description;

        $fullname = $request->fullname;
        $delivery_address = $request->address.' '.$request->address2;
        $provinsi = $request->nama_propinsi;
        $city = $request->nama_kota;
        $kecamatan = $request->nama_kecamatan;
        $hp1 = $request->hp1;
        $hp2 = $request->hp2;
        $kode_pos = $request->kode_pos;	
        $courier_name  = $request->courier_type;

        $delivery_address = $delivery_address.", ".$kecamatan.", ".$city.", ".$provinsi;

        TrPo::create([
            'POUUID' => $POUUID,
            'BatchUUID' => $BatchUUID,
            'RequestOrderUUID' => $RequestOrderUUID,
            'CustomerUUID' => $CustomerUUID,
            'po_id' => $po_id, 
            'trans_date' => date('Y-m-d H:i:s'),
            'created_by' => $CustomerUUID,
            'subtotal' =>  $subtotal_final,
            'ongkir' =>  $ongkir,
            'ongkir_type' => $paket_kirim,
            'insurance' => $insurance_value,
            'block_package' => $packing_value,
            'unique_amount' => $unique_amount,
            'e_wallet_amount' => $e_wallet_value,
            'total_trans' => $grand_total,
            'receiver_name' => $fullname,
            'receiver_address' => $delivery_address,
            'receiver_province' =>$provinsi,
            'receiver_city' => $city,
            'receiver_kecamatan' =>  $kecamatan,
            'receiver_hp1' => $hp1,
            'receiver_hp2' => $hp2,
            'receiver_kodepos' => $kode_pos,
            'status' => $status_po,
            'is_dropshipper' => $request->use_dropship ?? 0, 
            'use_ewallet' => $use_ewallet,
            'total_paid' => $total_paid,
            'dp_amount' => '0',
            'total_outstanding' => $total_outstanding, 
            'notes' => $request->note ?? "",
            'ByUserUUID' => $CustomerUUID,
            'additional_shipping_fee' => '0',
            'ByUserIP' => $request->ip(),
            'OnDateTime' => date('Y-m-d H:i:s'),
            'total_seq' => $seq,
            'courier_name' => $courier_name,
            'payment_dp' => '0',
            'address' => $request->address,

            'disc' => 0,
            'no_resi' => "",
            'dropshipper_name' => $request->dropshipper_name ?? "",
            'dropshipper_contact' => $request->dropshipper_contact ?? "",
            'refund_amount' => 0,
            'addendum_fee' => "",
            'addendum_note' => "",
            'payment_last' => "",
            'receiver_hp2' => "",
        ]);

        $invoice_id = $po_id.'/DP';
        $InvoiceUUID = '';

        if ($status_po == '01' && $total_paid < 50) {
            $InvoiceUUID = $this->newid();
            TrInvoice::create([
                'InvoiceUUID' => $InvoiceUUID,
                'POUUID' => $POUUID,
                'RequestOrderUUID' => $RequestOrderUUID,
                'CustomerUUID' => $CustomerUUID,
                'invoice_id' => $invoice_id, 
                'invoice_date' =>  date('Y-m-d'),
                'created_by' => $CustomerUUID,
                'subtotal' => $subtotal_final,
                'ongkir' => $ongkir,
                'insurance' => $insurance_value,
                'block_package' => $packing_value,
                //'discount' => $voucher_value,
                'discount' => 0,
                'e_wallet_amount' => $e_wallet_value,
                //'payment_methode' => $payment,
                'payment_methode' => '',
                'unique_amount' => $unique_amount,
                'grand_total' => $total_outstanding,
                'status_invoice' => $status_po,
                'ByUserUUID' => $CustomerUUID,    
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s'),
                
                'total_outstanding' => "",
            ]);

            TrRequestOrder::where('RequestOrderUUID', $RequestOrderUUID)->update([
                'status' => '02',
                'POUUID' => $POUUID,
                'InvoiceUUID' => $InvoiceUUID,
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);
        } else if($status_po == '00' && $total_paid >= 50) {
            $PaymentUUID = $this->newid();
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

            TrRequestOrder::where('RequestOrderUUID', $RequestOrderUUID)->update([
                'status' => '03',
                'POUUID' => $POUUID,
                'InvoiceUUID' => $InvoiceUUID,
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);
        } else {
            TrRequestOrder::where('RequestOrderUUID', $RequestOrderUUID)->update([
                'status' => '03',
                'POUUID' => $POUUID,
                'InvoiceUUID' => $InvoiceUUID,
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);
        }

        LogTransaction::create([
            'LogTransUUID' => $this->newid(),
            'POUUID' => $POUUID,
            'log_date' => date('Y-m-d H:i:s'),
            'action_desc' => "Customer Submit Pre Order Transaction with PO ID : ".$po_id,
            'created_by' => $fullname,
            'UserUUID' =>  $CustomerUUID
        ]);

        $customer_name = session('customer_name');
        LogActv::create([
            'id' => $this->newid(),
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

        // Send Email Notification        
        $EmailUUID = 'eb7498f1-0820-4171-a20f-1fe32b5b06e9'; //Invoice for DP
        $subject = "";
        if($status_po == '01')
			$subject = 'House of Makeup Invoice for Pre Order: '.$invoice_id;
		else
			$ubject = 'House of Makeup Pre Order : '.$po_id;

        $email_customer = Registercostumer::where('CustomerUUID', $CustomerUUID)->first()->email;
        $emailsent = Mail::to($email_customer)->send(new InvoiceDPEmail(
            $po_id, $fullname, $delivery_address, $POUUID, $EmailUUID, $subject
        ));
        if (!($emailsent instanceof \Illuminate\Mail\SentMessage)) {
            return redirect()->back()->with('error', 'Gagal mengirim email!');
        }

        DB::commit();
        return redirect(route('process_order.notification'))
            ->withSuccess("Data berhasil ditambahkan");

    } catch(\Exception $e) {
        DB::rollback();
        // dd($e);
        return redirect()->back()->withError('Data gagal ditambahkan');
    }
}

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $requestOrder = TrRequestOrder::where('request_id', $id)->first();
        $data['requestorder'] = $requestOrder; 
        $data['preorders'] = TrRequestOrderDtl::where('RequestOrderUUID', $requestOrder->RequestOrderUUID)
            ->orderBy('seq', 'asc')->get();
        
        $CustomerUUID = session('user_id');
        $data['costumer'] = Registercostumer::where('CustomerUUID', $CustomerUUID)->first();
        $data['ewallet'] = TrEwallet::where('CustomerUUID', $CustomerUUID)->sum('amount');
        // return $data['ewallet'];
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
