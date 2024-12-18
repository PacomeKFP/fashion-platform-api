<?php

namespace App\Listeners;

use App\Events\CommandeMiseAJour;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCommandeMiseAJourNotification
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
    public function handle(CommandeMiseAJour $event): void
    {
        $user = $event->commande->user;
        $user->notify(new CommandeMiseAJourNotification($event->commande));
    }
}
