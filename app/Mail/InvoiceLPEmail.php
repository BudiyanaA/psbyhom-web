<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TrRequestOrderDtl;
use App\Models\SysParam;
use App\Models\TrPo;
use App\Models\TrPoDtl;
use App\Models\MsBank;
use App\Models\MsEmail;

class InvoiceLPEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($po_id, $fullname, $delivery_address, $POUUID, $EmailUUID)
    {
        $this->po_id = $po_id;
        $this->fullname = $fullname;
        $this->delivery_address = $delivery_address;
        $this->POUUID = $POUUID;
        $this->EmailUUID = $EmailUUID;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
        $data_notif['line_id'] = '@houseofmakeup';
        $data_notif['email_notif'] = SysParam::where('sys_id', 'SYS_PARAM_43')
            ->first()->value_1;

        $data_notif['po_id'] = $this->po_id;
        $data_notif['invoice_date'] = date('Y-m-d');
        $data_notif['customer_name'] = $this->fullname;
        $data_notif['delivery_address'] = $this->delivery_address;

        $data_notif['view_order'] = TrPo::where('POUUID', $this->POUUID)->with('msCustomer')->first(); 
        $data_notif['order_dtl'] = TrPoDtl::where('POUUID', $this->POUUID)->with('requestOrderDtl')
            ->orderBy('seq', 'ASC')->get();
        $data_notif['list_of_bank'] = MsBank::where('status', '00')->get();

        $email = MsEmail::where('EmailUUID', $this->EmailUUID)->first();
        $email_content = $email->email_content;
        $email_content = str_replace('$customer_name', $this->fullname, $email_content);
        $email_content = str_replace('https://psbyhom.com/confirm_payment.html', url('payment/confirm'), $email_content);
        $email_content = str_replace('http://psbyhom.com/confirm_payment.html', url('payment/confirm'), $email_content);
        $email_title = $email->email_title;
				$email_title = str_replace('$po_id',$this->po_id, $email_title);

        $data_notif['email_content'] = $email_content;
        $data_notif['email_content_bottom'] = $email->email_content_bottom;
        $data_notif['EmailUUID'] = $this->EmailUUID;

        return $this->view('emails.invoicelp')
            ->subject($email_title)
            ->with($data_notif);
    }
}
