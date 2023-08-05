<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TrRequestOrderDtl;
use App\Models\TrRequestOrder;
use App\Models\TrPo;
use App\Models\LogActv;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Auth;
use App\Models\MsEmail;
use App\Models\SysParam;
use App\Mail\AdminEmail;
use Log;

class PreOrderSgController extends Controller
{
    public function index()
    {
        return view('preorder_sg.notification');
    }

    public function create()
    {
 
        return view('preorder_sg.create');
    }

    function generateRandomString($length = 2) 
    {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = 'SG';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

public function generate_ro_id()
{
    $id = date('Y');
    $date = str_replace("-", "", $id);
    $query = DB::select('SELECT RIGHT(request_id,4) as request_id FROM tr_request_order 
                        WHERE YEAR(created_date) = "' . date('Y') . '"
                        ORDER BY RIGHT(request_id,4) DESC');

    if (!isset($query[0]->request_id)) {
        $po_id = '0001';
    } else {
        $latest_id = $query[0]->request_id;
        $po_id = $latest_id + 1;
        if (strlen($po_id) == 1) {
            $po_id = '000' . $po_id;
        } else if (strlen($po_id) == 2) {
            $po_id = '00' . $po_id;
        } else if (strlen($po_id) == 3) {
            $po_id = '0' . $po_id;
        }
    }
    return $po_id;
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

    public function store(Request $request)
    {
     //    dd(session('customer_name'));
     //    dd(session('user_id'));
     //    dd($request->all());
        $validated = $request->validate([
            'qty' => 'required|array|min:1',
            'product_url' => 'required|array|min:1',
            'product_name' => 'required|array|min:1',
            'price_customer' => 'required|array|min:1',

            'qty.*' => 'required|numeric|min:1',
            'product_url.*' => 'required|url|min:1',
            'product_name.*' => 'required|min:1|regex:/^[\x20-\x7E]*$/',
            'price_customer.*' => 'required|numeric|min:1',
        ], [
            'product_name.*.regex' => 'Please remove the special characters.',
        ]);
         DB::beginTransaction();
         try {
             // $qty = (int)$validated['qty']; 
             // $seq = 1;
             // $sys = 1.07 ;
             // $uuid = Str::uuid()->toString();
             $total_items = 0;
             $total_price = 0;
 
            //  Using SGD
             $forex = SysParam::where('sys_id', 'SYS_PARAM_99')->first()->value_1;
 
             // Insert tr_request_order_dtl
             for ($i = 0; $i < count($request->qty); $i++) {
                TrRequestOrderDtl::create([
                    'RequestOrderDtlUUID' => $this->newid(),
                    'remarks' => $request->remarks[$i] ?? "",
                    'RequestOrderUUID' => $request->RequestOrderUUID,
                    'product_name' => iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $request->product_name[$i]),
                    'product_url' => iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $request->product_url[$i]),
                    'qty' => $request->qty[$i],
                    'size' => $request->size[$i] ?? "",
                    'color' => $request->color[$i] ?? "",
                    'price_customer' => $request->price_customer[$i],
                    'forex_rate' => $forex,
                    'subtotal_original' => ($request->qty[$i] * $request->price_customer[$i]) * $forex,
                    'status' => '00',
                    'seq' => $i + 1,

                    'additional_fee' => 0,
                    'subtotal_final' => 0,
                    'disc_percentage' => 0,
                ]);
                 
                 $total_items++;
                 $total_price = $total_price + ($request->qty[$i] * $request->price_customer[$i]);
                 // $CustomerUUID = $this->newid();
             }
 
             $CustomerUUID = session('user_id');
             $customer_name = session('customer_name');
             $request_id = $this->generateRandomString().date('y').date('m').$this->generate_ro_id();
             // Insert tr_request_order
             TrRequestOrder::create([
                 'RequestOrderUUID' => $request->RequestOrderUUID,
                 'CustomerUUID' => $CustomerUUID,
                 // 'customer_name' => $customer_name,             
                 'request_id' => $request_id,
                 'created_date' => date('Y-m-d H:i:s'),
                 'status' => '00',
                 'forex' => $forex,
                 'factor' => '1.07',
                 'total_items' => $total_items,
                 'total_price' => $total_price * $forex,
                 'ByUserUUID' => $CustomerUUID,
                 'ByUserIP' => $request->ip(),
                 'OnDateTime' => date('Y-m-d H:i:s'),
                 'POUUID' => "",
                 'InvoiceUUID' => "",
                 'note' => "",
                 'po_type' => 'SG',
             ]);
             
             // $id= uniqid();
             // $customer_name = session('customer_name');
             // $request_id = $this->generateRandomString().date('y').date('m').$this->generate_ro_id();
             
             // Insert log_actv
             LogActv::create([
                 'id' => $this->newid(),
                 'user_id' => $customer_name,
                 'UserUUID' => $CustomerUUID,
                 'menu_nm' => 'Submit Request Order',
                 'log_time' => date('Y-m-d H:i:s'),
                 'Description' => 'Submit Request Order : '.$request_id,
                 'LogType' => 'Create',
                 'user_type' => 'Customer',
                 'RefUUID' => $CustomerUUID,
                 'is_financial' => '1',
                 'is_error' => '0',
                 'ByUserUUID' => $CustomerUUID,
                 'ByUserIP' => $request->ip(),
                 'OnDateTime' => date('Y-m-d H:i:s')
             ]);
 
             // Send email notification to Admin
             // $request_id = $this->generateRandomString().date('y').date('m').$this->generate_ro_id();
             $emailUUID = 'b1aa97ee-6a1c-4ce5-be19-b664200f2784'; //New Order Notifications
             $email = MsEmail::where('EmailUUID', $emailUUID)->first();
             
             $po_id = $request_id; 
             // $customer_name = session('customer_name');
             $email_content = $email->email_content;
             $email_content = str_replace('$po_id', $po_id, $email_content);
             // $email_content = str_replace('#CUSTOMER_NAME#', $customer_name, $email_content);
             $email_content_bottom = $email->email_content_bottom;
             $email_notif = SysParam::where('sys_id', 'SYS_PARAM_43')->first();
             
             $email_admin = SysParam::where('sys_id', 'SYS_PARAM_16')->first();
             $emailsent = Mail::to($email_admin->value_1)
                 ->send(new AdminEmail(
                     $po_id, 
                     $email_content, 
                     $email_content_bottom, 
                     $email_notif->value_1));
             // Mail::to("dederizki130102@gmail.com")->send(new SendEmail());
 
             if (!($emailsent instanceof \Illuminate\Mail\SentMessage)) {
                 return redirect()->back()->with('error', 'Gagal mengirim email!');
             }
             // if (Mail::failures()) {
             //     return redirect()->back()->with('error', 'Gagal mengirim email!');
             // }

             DB::commit();
         
             return redirect(route('preorder_sg.notification'))
                 ->withSuccess("Data berhasil ditambahkan");
                 
         
         } catch(\Exception $e) {
            DB::rollback();
            Log::error($request->all());
            Log::error($e->getMessage());
            //  dd($e);
            return redirect()->back()->withError('Data gagal ditambahkan');
         } 
}
}
