<?php

namespace App\Mail;

use App\Models\Checkout;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $checkout;
    public $checkoutItems;

    /**
     * Create a new message instance.
     */
    public function __construct(Checkout $checkout, $checkoutItems)
    {
        $this->checkout = $checkout;
        $this->checkoutItems = $checkoutItems;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Order Confirmation')
                    ->view('emails.order_placed');
    }
}
