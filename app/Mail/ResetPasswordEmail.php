<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\SysParam;
use App\Models\MsEmail;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $fullname, $token_id, $EmailUUID)
    {
        $this->email = $email;
        $this->fullname = $fullname;
        $this->token_id = $token_id;
        $this->EmailUUID = $EmailUUID;
    }

    public function build()
    {
        $data_notif['line_id'] = '@houseofmakeup';
        $data_notif['email_notif'] = SysParam::where('sys_id', 'SYS_PARAM_43')
            ->first()->value_1;
        
        $email = MsEmail::where('EmailUUID', $this->EmailUUID)->first();
        $email_content = $email->email_content;
        $email_content = str_replace('$customer_name', $this->fullname, $email_content);
        $email_title = $email->email_title;
    
        $data_notif['email_content'] = $email_content;
        $data_notif['email_content_bottom'] = $email->email_content_bottom;

        $data_notif['token_id'] = $this->token_id;
        $data_notif['email'] = $this->email;

        return $this->view('emails.resetpassword')
            ->subject($email_title)
            ->with($data_notif);
    }
}
