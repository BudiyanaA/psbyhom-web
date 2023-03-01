<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RefundEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($po_id, $total_refund, $order_dtl, $email_content, $email_content_bottom, $email_notif)
    {
        $this->email_content = $email_content;
        $this->email_content_bottom = $email_content_bottom;
        $this->email_notif = $email_notif;
        $this->po_id = $po_id;
        $this->total_refund = $total_refund;
        $this->order_dtl = $order_dtl;
    }

    public function build()
    {
        return $this->view('emails.refund')
            ->subject('Refund Invoice ' . $this->po_id)
            ->with([
                'total_refund' => $this->total_refund,
                'order_dtl' => $this->order_dtl,
                'email_content' => $this->email_content,
                'email_content_bottom' => $this->email_content_bottom,
                'email_notif' => $this->email_notif,
            ]);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Refund Email',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'view.name',
        );
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
