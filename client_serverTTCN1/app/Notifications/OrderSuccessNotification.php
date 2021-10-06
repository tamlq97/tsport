<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderSuccessNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'order_date' => $this->order->created_at,
            'madh' => $this->order->madh,
            'count' => $notifiable->unreadNotifications->count(),
            'message' => 'A new order OrderCode:' . $this->order->madh . ' from user_id:' . $this->order->user_id
        ]);
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'order_date' => $this->order->created_at,
            'madh' => $this->order->madh,
            'user_id' => $this->order->user_id,
            'payment_id' => $this->order->payment_id,
            'required_date' => $this->order->required_date,
            'ship_date' => $this->order->ship_date,
            'message' => 'A new order OrderCode:' . $this->order->madh . ' from user_id:' . $this->order->user_id
        ];
    }
}
