<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orders.shipped')
            // ->text('emails.orders.shipped_plain')
            ->subject("VinhTrang - Notify order successful")
            ->with([
                'receiver' => $this->data['contact_fname'] . ' ' . $this->data['contact_lname'],
                'products' => $this->data['products'],
                'total' => $this->data['total'],
                'madh' => $this->data['madh'],
                'number' => $this->data['phone'],
                'sender' => env('MAIL_FROM_NAME'),
                'address' => $this->data['address'],
                'orderDate' => $this->data['order_date']
            ]);
        // return $this->markdown('emails.orders.shipped');
    }
}
