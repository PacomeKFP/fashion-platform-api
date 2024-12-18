<?php

namespace App\Listeners;

use App\Events\CommandeConfirmee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCommandeConfirmeeNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CommandeConfirmee $event): void
    {
        $user = $event->commande->user;
        $user->notify(new CommandeConfirmeeNotification($event->commande));
    }
}
