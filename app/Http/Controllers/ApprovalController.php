<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrRequestOrder;
use App\Models\SysParam;
use App\Models\TrRequestOrderDtl;
use App\Models\LogActv;
use App\Models\Registercostumer;
use App\Models\MsEmail;
use App\Mail\QuotationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\TrEwallet;

class ApprovalController extends Controller
{
    public function index()
    {
        
        return view('approval.index');
    }
    public function edit(Request $request, $id)
    {
        $data['order'] = TrRequestOrder::with('customer')->where('RequestOrderUUID', $id)->first();
        // $data['forex'] = SysParam::where('sys_id', 'SYS_PARAM_44')->first()->value_1;
        $data['requestorder'] = TrRequestOrderDtl::where('RequestOrderUUID', $id)
            ->orderBy('seq', 'ASC')->get();
            // $data['ewallet'] = TrEwallet::where('CustomerUUID', $id)->sum('amount');
        return view('approval.edit',$data);     
    }

    public function update(Request $request, $id)
    {
        $AdminUUID = session('admin_id');
        $username = session('admin_name');
        
        DB::beginTransaction();
        try {
            if ($request->submit == "send_invoice") {
                TrRequestOrder::where('RequestOrderUUID', $id)
                    ->update([
                        'total_price' =>  $request->grand_totals,
                        'note' =>  $request->note ?? "",
                        'status' => '01',
                        'ByUserUUID' => $AdminUUID,
                        'ByUserIP' => $request->ip(),
                        'OnDateTime' => date('Y-m-d H:i:s')
                    ]);

                $order_dtl = TrRequestOrderDtl::where('RequestOrderUUID', $id)
                    ->orderBy('seq', 'ASC')->get();
                // USD
                $forex = SysParam::where('sys_id', 'SYS_PARAM_44')->first()->value_1;
    
                $i = 0;
                foreach ($order_dtl as $row) {
                    $data = [
                        'product_name' => $request->product_name[$i],
                        'qty' => $request->qty[$i],
                        'product_url' => $request->product_url[$i],
                        'price_customer' => $request->price_customer[$i],
                        'size'	=> $request->size[$i] ?? "",
                        'color' => $request->color[$i] ?? "",
                        'disc_percentage' => $request->disc_percentage[$i],
                        'additional_fee' => $request->additional_fee[$i],
                        'subtotal_final' => $request->subtotal[$i],
                        'forex_rate' => $forex,
                        'remarks' => $request->remarks[$i] ?? "",
                    ];
                    TrRequestOrderDtl::where('RequestOrderDtlUUID', $row->RequestOrderDtlUUID)
                        ->update($data);
                    $i++;
                }

                LogActv::create([
                    'id' => $this->newid(),
                    'user_id' => $username,
                    'UserUUID' => $AdminUUID,
                    'menu_nm' => 'Update RequestOrder',
                    'log_time' => date('Y-m-d H:i:s'),
                    'Description' => '<b>Update RequestOrder : </b>'.$request->request_id,
                    'LogType' => 'Update',
                    'user_type' => 'Admin',
                    'RefUUID' => $id,
                    'is_financial' => '0',
                    'is_error' => '0',
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);

                // Mail::to("dederizki130102@gmail.com")->send(new SendEmail());
                $email_notif = SysParam::where('sys_id', 'SYS_PARAM_43')->first();
                $po_id = $request->request_id;

                $request_order = TrRequestOrder::where('RequestOrderUUID', $id)->first();
                $customer = Registercostumer::where('CustomerUUID', $request_order->CustomerUUID)
                    ->first();

                $emailUUID = '9db5502b-cddb-4ae9-bd07-060a9fdc629c'; //Quotation
                $email = MsEmail::where('EmailUUID', $emailUUID)->first();
                 $email_content = $email->email_content;
                // $email_content = str_replace('$po_id', $po_id, $email_content);
                $email_content = str_replace('$customer_name', $customer->customer_name, $email_content);
                $email_content = str_replace('https://psbyhom.com/view_request/$po_id', url('request/view/' . $po_id), $email_content);

                $email_content_bottom = $email->email_content_bottom;
                $note = $request->note;
                $order_dtl = TrRequestOrderDtl::where('RequestOrderUUID', $id)
                    ->orderBy('seq', 'ASC')->get();

                $emailsent = Mail::to($customer->email)
                    ->send(new QuotationEmail(
                        $po_id,
                        $note,
                        $order_dtl, 
                        $email_content, 
                        $email_content_bottom, 
                        $email_notif->value_1));
    
                if (!($emailsent instanceof \Illuminate\Mail\SentMessage)) {
                    return redirect()->back()->with('error', 'Gagal mengirim email!');
                }

                DB::commit();
                return redirect(route('order.notification'))
                    ->withSuccess("Data berhasil diubah");
            } else if ($request->submit == "cancel") {
                TrRequestOrder::where('RequestOrderUUID', $id)
                    ->update([
                        'status' => '03',
                        'ByUserUUID' => $AdminUUID,
                        'ByUserIP' => $request->ip(),
                        'OnDateTime' => date('Y-m-d H:i:s')
                    ]);

                LogActv::create([
                    'id' => $this->newid(),
                    'user_id' => $username,
                    'UserUUID' => $AdminUUID,
                    'menu_nm' => 'Update RequestOrder',
                    'log_time' => date('Y-m-d H:i:s'),
                    'Description' => '<b>Update RequestOrder jadi cancel: </b>'.$request->request_id,
                    'LogType' => 'Update',
                    'user_type' => 'Admin',
                    'RefUUID' => $id,
                    'is_financial' => '0',
                    'is_error' => '0',
                    'ByUserUUID' => $AdminUUID,
                    'ByUserIP' => $request->ip(),
                    'OnDateTime' => date('Y-m-d H:i:s')
                ]);
                DB::commit();
                return redirect(route('order.notification'))
                    ->withSuccess("Data berhasil diubah");
            } else {
                return redirect(route('dashboard'));
            }

        } catch(\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect()->back()->withError('Data gagal diubah');
        }
    }

    public function show(Request $request, $id)
    {
        $data['customer'] = Registercostumer::where('CustomerUUID', $id)->first();
        $data['log_actv'] = LogActv::where('UserUUID', $id)
            ->orderBy('log_time', 'DESC')->get();
            $data['ewallet'] = TrEwallet::where('CustomerUUID', $id)->sum('amount');
            $data['wallet'] = TrEwallet::where('CustomerUUID', $id)
            ->orderBy('trans_date', 'DESC')->get();
        return view('approval.detail', $data);
    }

    public function notification()
    {
        return view('approval.notification');
    }

}
