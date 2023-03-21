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

class VerifiedPaymentEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($po_id, $fullname, $payment_amount, $EmailUUID)
    {
        $this->po_id = $po_id;
        $this->fullname = $fullname;
        $this->payment_amount = number_format(floatval($payment_amount));
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

        $email = MsEmail::where('EmailUUID', $this->EmailUUID)->first();
        $email_content = $email->email_content;
        $email_content = str_replace('$customer_name', $this->fullname, $email_content);
        $email_content = str_replace(' $payment_amount', $this->payment_amount, $email_content);
        $email_title = $email->email_title;
				$email_title = str_replace('$po_id',$this->po_id, $email_title);
        $data_notif['email_content'] = $email_content;
        $data_notif['email_content_bottom'] = $email->email_content_bottom;

        return $this->view('emails.verifiedpayment')
            ->subject($email_title)
            ->with($data_notif);
    }
}
