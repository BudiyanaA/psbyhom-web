<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrPo;

class PaymentSgController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status');
        if ($status === '00') {
            $title = 'DP Confirmation';
            $subtitle = 'List of PO Waiting DP Verification';
        } else if ($status === '01') {
            $title = 'Waiting Payment';
            $subtitle = '';
        } else if ($status === '05') {
            $title = 'Last Payment Confirmation';
            $subtitle = 'List of PO Waiting Last Payment Verification';
        } else if ($status === '06') {
            $title = 'Ready to Ship';
            $subtitle = 'List of PO Waiting to be delivered';
        } else {
            $title = '';
            $subtitle = '';
        }
        $order_by = $request->input('order_by', 'DESC');
        $customer_name = $request->input('customer_name');
        $total_trans = $request->input('total_trans');
        $po_id = $request->input('po_id');
        $payment = TrPo::with(['msCustomer', 'trRequestOrder','msBatch','msStatus'])->where('po_type', 'SG');
        if ($request->status) {
            $payment = $payment->whereIn('status', explode(",", $request->input('status')));
        }
        // if ($request->trans_date_start) {
        //     $payment = $payment->where('trans_date', '>=', $request->trans_date_start);
        // }
        // if ($request->trans_date_end) {
        //     $payment = $payment->where('trans_date', '<=', $request->trans_date_end);
        // }
        if ($request->po_id) {
            $payment = $payment->where('po_id', 'like', '%'.$request->po_id.'%');
        }

        if ($request->total_trans) {
            // Menghapus tanda koma dari input pencarian
            $total_trans = str_replace(',', '', $request->total_trans);
        
            // Melakukan pencarian dengan operator LIKE
            $payment = $payment->where('total_trans', 'like', '%' . $total_trans . '%');
        }
        // if ($request->batch_id) {
        //     $payment = $payment->whereHas('msBatch', function($query) use($request) {
        //         $query->where('batch_id', 'like', '%'.$request->batch_id.'%');
        //     });
        // }
        if ($request->customer_name) {
            $payment = $payment->whereHas('msCustomer', function($query) use($request) {
                $query->where('customer_name', 'like', '%'.$request->customer_name.'%');
            });
        }
        $payment = $payment->orderBy('OnDateTime', $order_by)->get();
        $data['customer_name'] = $customer_name;
        $data['total_trans'] = number_format($total_trans);
        $data['po_id'] =$po_id;
        $data['order_by'] = $order_by;
        
        return view('payment_sg.index', ['title' => $title, 'subtitle' => $subtitle, 'status' => $status,'payment' => $payment ,'po_id' => $po_id,'total_trans' => $total_trans,'customer_name' => $customer_name,'order_by' => $order_by]);
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

    public function updateResi(Request $request)
    {
        
            $no_resi = $request->input('no_resi');

            return response()->json(['success' => true]);

            $email_notif = SysParam::where('sys_id', 'SYS_PARAM_43')->first();
            $po_id = $request->request_id;

            $request_order = TrRequestOrder::where('RequestOrderUUID', $id)->first();
            $customer = Registercostumer::where('CustomerUUID', $request_order->CustomerUUID)
                ->first();

            $emailUUID = 'ce7926a7-126b-474c-b6d8-cdab04f96d88'; //Quotation
            $email = MsEmail::where('EmailUUID', $emailUUID)->first();
            $email_content = $email->email_content;
            $email_content = str_replace('$po_id', $po_id, $email_content);
            $email_content = str_replace('$customer_name', $customer->customer_name, $email_content);
            $email_content_bottom = $email->email_content_bottom;
            $no_resi = $request->no_resi;
            $order_dtl = TrRequestOrderDtl::where('RequestOrderUUID', $id)
                ->orderBy('seq', 'ASC')->get();
                $emailsent = Mail::to($customer->email)
                    ->send(new ResiEmail(
                        $po_id,
                        $no_resi,
                        $order_dtl, 
                        $email_content, 
                        $email_content_bottom, 
                        $email_notif->value_1));
                        TrPoDtl::where('POUUID',$id)
                                ->update([
                                    'status' => '07',
                                    'no_resi' => $request->no_resi
                                ]);
                                $AdminUUID = session('admin_id');
                                LogTransaction::create([
                                    'LogTransUUID' => $this->newid(),
                                    'POUUID' => $id,
                                    'log_date' => date('Y-m-d H:i:s'),
                                    'action_desc' => "Admin process the order",
                                    'created_by' => 'Admin',
                                    'UserUUID' => $AdminUUID
                                ]);   

    }
}
