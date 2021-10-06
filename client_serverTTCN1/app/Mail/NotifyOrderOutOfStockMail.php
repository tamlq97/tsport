<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyOrderOutOfStockMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orders.orderOutOfStock')
        ->subject("VinhTrang - Notify Products Out of Stock")
        ->with([
            'receiver' => $this->order->customer->contact_fname . ' ' . $this->order->customer->contact_lname,
            'products' => $this->order['detail'],
            'total' => $this->order['detail'][0]['total'],
            'madh' => $this->order['madh'],
            'number' => $this->order->customer->phone,
            'sender' => env('MAIL_FROM_NAME'),
            'address' => $this->order->customer->address,
            'orderDate' => $this->order['created_at']
        ])
        ;
    }
}
