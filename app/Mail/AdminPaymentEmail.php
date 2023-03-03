<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\SysParam;

class AdminPaymentEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice_id, $POUUID)
    {
      $this->invoice_id = $invoice_id;
      $this->POUUID = $POUUID;
    }

    public function build()
    {
      $data_notif['line_id'] = '@houseofmakeup';
      $data_notif['email_notif'] = SysParam::where('sys_id', 'SYS_PARAM_43')
        ->first()->value_1;
      $data_notif['invoice_id'] = $this->invoice_id;
      $data_notif['POUUID'] = $this->POUUID;

      return $this->view('emails.adminpayment')
          ->subject('New Payment Confirmation for Invoice  : '.$this->invoice_id)
          ->with($data_notif);
    }

}
