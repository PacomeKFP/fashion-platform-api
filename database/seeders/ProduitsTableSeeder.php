<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Produit;
use App\Models\Styliste;
use Faker\Factory as Faker;

class ProduitsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $stylistes = Styliste::all();

        Storage::makeDirectory('public/produits');

        foreach (range(1, 10) as $index) {
            $photoPath = $this->generateDemoImage($index);

            Produit::create([
                'styliste_id' => $stylistes->random()->id,
                'nom' => $faker->word,
                'description' => $faker->sentence,
                'prix' => $faker->randomFloat(2, 50, 500),
                'categorie' => $faker->randomElement(['traditionnelle', 'soirée', 'costume']),
                'delai_confection' => $faker->numberBetween(3, 14),
                'photos' => [$photoPath]
            ]);
        }
    }

    private function generateDemoImage($index)
    {
        $image = imagecreate(800, 600);
        $background = imagecolorallocate($image, 240, 240, 240);
        $textColor = imagecolorallocate($image, 0, 0, 0);
        
        imagestring($image, 5, 300, 280, "Produit $index", $textColor);
        
        $path = "produits/produit_$index.png";
        $fullPath = storage_path("app/public/$path");
        
        imagepng($image, $fullPath);
        imagedestroy($image);
        
        return $path;
    }
}