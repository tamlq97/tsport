<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Events\BroadcastNotificationCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendOrderSuccessMail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BroadcastNotificationCreated  $event
     * @return void
     */
    public function handle(BroadcastNotificationCreated $event)
    {
        Log::warning("BBB",[$event]);
    }
}
