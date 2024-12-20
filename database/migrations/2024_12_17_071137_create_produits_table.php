<?php

use App\Models\Categorie;
use App\Models\Styliste;
use App\Models\Mensuration;
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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Styliste::class);
            $table->foreignIdFor(Mensuration::class);
            $table->foreignIdFor(Categorie::class);
            $table->string('nom')->nullable();//
            $table->text('description')->nullable();//
            $table->float('prix')->nullable();
            $table->date('delai_confection')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
