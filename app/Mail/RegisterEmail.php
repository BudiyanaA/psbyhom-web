<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($customer_name, $token_id, $email_notif)
    {
        $this->customer_name = $customer_name;
        $this->token_id = $token_id;
        $this->email_notif = $email_notif;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registeremail')
            ->subject('Please Activate Your Account Now')
            ->with([
                'customer_name' => $this->customer_name,
                'token_id' => $this->token_id,
                'email_notif' => $this->email_notif,
            ]);
    }
}

    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Send Email',
    //     );
    // }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    // public function attachments()
    // {
    //     return [];
    // }
