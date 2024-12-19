<?php

namespace App\Providers;

use App\Models\Photo;
use App\Policies\PhotoPolicy;


use App\Models\LigneCommande;
use App\Policies\LigneCommandePolicy;

use App\Models\Mensuration;
use App\Policies\MensurationPolicy;

use App\Models\Modele;
use App\Policies\ModelePolicy;


use App\Models\Categorie;
use App\Policies\CategoriePolicy;

use App\Models\AvisStyliste;
use App\Policies\AvisStylistePolicy;

use App\Models\AvisClient;
use App\Policies\AvisClientPolicy;

use App\Models\Paiement;
use App\Policies\PaiementPolicy;

use App\Models\Commande;
use App\Policies\CommandePolicy;


use App\Models\Produit;
use App\Policies\ProduitPolicy;

use App\Models\Styliste;
use App\Policies\StylistePolicy;














use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Photo::class => PhotoPolicy::class,
        LigneCommande::class => LigneCommandePolicy::class,
        Mensuration::class => MensurationPolicy::class,
        Modele::class => ModelePolicy::class,
        Categorie::class => CategoriePolicy::class,
        AvisStyliste::class => AvisStylistePolicy::class,
        AvisClient::class => AvisClientPolicy::class,
        Paiement::class => PaiementPolicy::class,
        Commande::class => CommandePolicy::class,
        Produit::class => ProduitPolicy::class,
        Styliste::class => StylistePolicy::class,

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
