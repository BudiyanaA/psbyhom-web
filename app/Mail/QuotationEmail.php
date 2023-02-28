<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QuotationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($po_id, $note, $order_dtl, $email_content, $email_content_bottom, $email_notif)
{
    $this->email_content = $email_content;
    $this->email_content_bottom = $email_content_bottom;
    $this->email_notif = $email_notif;
    $this->po_id = $po_id;
    $this->note = $note;
    $this->order_dtl = $order_dtl;
}

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Admin Email',
    //     );
    // }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    //     {
    //         return (new Content(
    //             view: 'emails.admin',
    //         ))->with([
    //             'email_notif' => $this->email_notif,
    //             'email_content' => $this->email_content,
    //             'email_content_bottom' => $this->email_content_bottom,
    //             'po_id' => $this->po_id,
    //         ]);
    //     }

    public function build()
    {
        return $this->view('emails.quotation')
            ->subject('Price Quotation ' . $this->po_id)
            ->with([
                'note' => $this->note,
                'order_dtl' => $this->order_dtl,
                'email_content' => $this->email_content,
                'email_content_bottom' => $this->email_content_bottom,
                'email_notif' => $this->email_notif,
            ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
