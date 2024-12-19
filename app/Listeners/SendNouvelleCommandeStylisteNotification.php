<?php

namespace App\Listeners;

use App\Events\NouvelleCommandeStyliste;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNouvelleCommandeStylisteNotification
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
    public function handle(NouvelleCommandeStyliste $event): void
    {
        $styliste = $event->commande->styliste;

        if ($styliste) {
            $styliste->notify(new NouvelleCommandeStylisteNotification($event->commande));
        }
    }
}
