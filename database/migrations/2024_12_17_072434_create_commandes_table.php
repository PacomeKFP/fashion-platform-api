<?php

use App\Models\User;
use App\Models\Produit;
use App\Models\Styliste;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Produit::class);
            $table->foreignIdFor(Styliste::class);
            $table->enum('statut',['en attente','en cours','terminé','annulé' ])->default('en attente');
            $table->float('prix_total')->nullable();
            $table->timestamp('date_commande')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
