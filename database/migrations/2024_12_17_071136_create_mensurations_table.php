<?php

use App\Models\User;
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
        Schema::create('mensurations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,'client_id');
            $table->string('label')->nullable();
            $table->text('description')->nullable();
            $table->json('mesures')->nullable();
            $table->string('taille')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensurations');
    }
};
