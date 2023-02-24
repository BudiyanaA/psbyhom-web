<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($customer_name, $activation_link, $email_notif, $token_id)
    {
        $this->customer_name = $customer_name;
        $this->activation_link = $activation_link;
        $this->email_notif = $email_notif;
        $this->token_id = $token_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registeremail')
                    ->subject('Aktivasi Akun - '.$this->email_notif)
                    ->with([
                        'customer_name' => $this->customer_name,
                        'activation_link' => $this->activation_link.'?token_id='.$this->token_id,
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
