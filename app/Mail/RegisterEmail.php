<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $customer_name;
    public $activation_link;
    public $email_notif;

  

    public function build()
    {
        return $this->view('emails.registeremail')
                    ->subject('Aktivasi Akun - '.$this->email_notif)
                    ->with([
                        'customer_name' => $this->customer_name,
                        'activation_link' => $this->activation_link,
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
