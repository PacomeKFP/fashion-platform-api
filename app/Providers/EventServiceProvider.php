<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    /**
     * Les événements et leurs écouteurs correspondants.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\CommandeConfirmee::class => [
            \App\Listeners\SendCommandeConfirmeeNotification::class,
        ],
        \App\Events\CommandeMiseAJour::class => [
            \App\Listeners\SendCommandeMiseAJourNotification::class,
        ],
        \App\Events\NouvelleCommandeStyliste::class => [
            \App\Listeners\SendNouvelleCommandeStylisteNotification::class,
        ],
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
