<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\AdminPaymentEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\PaymentCostumer;
use App\Models\TrInvoice;
use App\Models\MsBank;
use App\Models\TrPayment;
use App\Models\TrPo;
use App\Models\TrRequestOrder;
use App\Models\LogTransaction;
use App\Models\LogActv;
use App\Models\SysParam;

class PaymentCostumerController extends Controller
{
    public function index()
{
    $latest_id = DB::table('preorders')->max('id');
    $data['preorders'] = DB::table('preorders')
        ->where('id', $latest_id)
        ->get();
    return view('payment_c.index', compact('data'));
}

public function create()
    {
        $CustomerUUID = session('user_id');
        $data['invoice'] = TrInvoice::where('CustomerUUID', $CustomerUUID)
            ->where('status_invoice', '01')->orderBy('OnDateTime', 'DESC')
            ->pluck('invoice_id', 'InvoiceUUID');
        
        $banks = MsBank::where('status', '00')->get();
        $data['banks'] = [];
        foreach ($banks as $bank) {
            $data['banks'][$bank->BankUUID] = $bank->bank_name ." | ". $bank->bank_account_no ." a/n: ". $bank->bank_account_name;
        }

        return view('payment_c.create',$data);
    }

public function store(Request $request)
    {
    // $validated = $request->validate([
    //     'invoice_amount' => 'required',
    //     'payment_amount' => 'required',
    //     'bank_destination' => 'required',
    //     'payment_date' => 'required',
    //     'transaction_receipt' => 'required',
    //     'bank_name' => 'required',
    //     'bank_account' => 'required',
    //     'account_name' => 'required',
    // ]);

    // dd($request->all());
    DB::beginTransaction();
    try {

        // Insert tr_payment
        $InvoiceUUID = $request->invoice_id;
        $invoice = TrInvoice::where('InvoiceUUID', $InvoiceUUID)->first();
        $payment_id ='PAY/'.str_replace('INV/','',$invoice->invoice_id).'/1';
        $CustomerUUID = session('user_id');
        $POUUID = $invoice->POUUID;

        // dd($invoice);

        TrPayment::create([
            'PaymentUUID' => $this->newid(),
            'payment_id' => $payment_id,
            'POUUID' => $POUUID,
            'InvoiceUUID' => '',
            'image_path' => '',
			'BankUUID' => $request->bank_id,
			'created_date' => date('Y-m-d H:i:s'),
			'created_by' => $CustomerUUID,
			'payment_amount' => str_replace('.','',$request->total_amount),
			'payment_date' => $request->payment_date,
			'bank_source' => $request->source_bank_name,
			'account_no_source' => $request->source_acct_no,
			'account_name_source' => $request->source_acct_name,
			// 'remarks' => $remarks,
            'remarks' => '',
			//'image_path' => $img_path,
			'status' => '00',  
			'ByUserUUID' => $CustomerUUID,
			'ByUserIP' => $request->ip(),
			'OnDateTime' => date('Y-m-d H:i:s')
        ]);

        // Update tr_request_order
        $RequestOrderUUID = TrPo::where('POUUID', $POUUID)->first()->RequestOrderUUID;
        if($RequestOrderUUID !='0')
        {
            TrRequestOrder::where('RequestOrderUUID', $RequestOrderUUID)->update([
                'status' => '04',
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);
        }

        // Update tr_invoice
        TrInvoice::where('InvoiceUUID', $InvoiceUUID)
            ->update([
                'status_invoice' => '02',
                'ByUserUUID' => $CustomerUUID,
                'ByUserIP' => $request->ip(),
                'OnDateTime' => date('Y-m-d H:i:s')
            ]);
        
        // Update tr_po
        $cek = $invoice->grand_total;
        $status_po = $cek != 0 ? '00' : '05';
        TrPo::where('POUUID', $POUUID)->update([
            'status' => $status_po,
            'ByUserUUID' => $CustomerUUID,
            'ByUserIP' => $request->ip(),
            'OnDateTime' => date('Y-m-d H:i:s')
        ]);

        // Insert Log Transaction
        LogTransaction::create([
            'LogTransUUID' => $this->newid(),
            'POUUID' => $POUUID,
            'log_date' => date('Y-m-d H:i:s'),
            'action_desc' => "Customer Submit Payment Confirmation : ".$payment_id,
            'created_by' => 'Customer',
            'UserUUID' =>  $CustomerUUID
        ]);

        // Insert Log Actv
        $customer_name = session('customer_name');
        $po_id = TrPo::where('POUUID', $POUUID)->first()->po_id;
        LogActv::create([
            'id' => $this->newid(),
            'user_id' => $customer_name,
            'UserUUID' => $CustomerUUID,
            'menu_nm' => 'Submit Payment Confirmation',
            'log_time' => date('Y-m-d H:i:s'),
            'Description' => 'Submit Payment Confirmation for PO ID : '.$po_id.' with payment amount : '.number_format(floatval($request->total_amount)),
            'LogType' => 'Create',
            'user_type' => 'Customer',
            'RefUUID' => $CustomerUUID,
            'is_financial' => '1',
            'is_error' => '0',
            'ByUserUUID' => $CustomerUUID,
            'ByUserIP' =>  $request->ip(),
            'OnDateTime' => date('Y-m-d H:i:s')
        ]);

        // Send Email to Admin
        $email_admin = SysParam::where('sys_id', 'SYS_PARAM_16')->first();
        $emailsent = Mail::to($email_admin->value_1)->send(new AdminPaymentEmail(
            $invoice->invoice_id, $POUUID
        ));
        if (!($emailsent instanceof \Illuminate\Mail\SentMessage)) {
            return redirect()->back()->with('error', 'Gagal mengirim email!');
        }

        DB::commit();
        return redirect(route('payment_c.notification'))
            ->withSuccess("Data berhasil ditambahkan");

    } catch(\Exception $e) {
        DB::rollback();
        dd($e);
        return redirect()->back()->withError('Data gagal ditambahkan');
    }
}

public function notification()
    {
        return view('payment_c.notification');
    }
}
