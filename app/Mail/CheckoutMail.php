<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Checkout;

class CheckoutMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $checkout;
    public $url_type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Checkout $checkout, $url_type)
    {
        $this->checkout = $checkout;
        $this->url_type = $url_type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('mail.checkout-email')->subject("A new email for contact form")
        ->with(['checkout'=> $this->checkout, 'url_type' => $this->url_type]);
    }
}
