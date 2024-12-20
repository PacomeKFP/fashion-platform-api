<?php

namespace Database\Seeders;

use App\Models\Mensuration;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory(9)->create();
        $this->call([
            StylisteSeeder::class,
            CategorieSeeder::class,
            MensurationSeeder::class,
            ProduitSeeder::class,
            CommandeSeeder::class,
            PaiementSeeder::class,
            AvisStylisteSeeder::class,
            AvisClientSeeder::class,
            ModeleSeeder::class,
            LigneCommandeSeeder::class,
            PhotoSeeder::class
        ]);


    }
}

