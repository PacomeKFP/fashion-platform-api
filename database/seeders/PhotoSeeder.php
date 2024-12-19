<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $model_id = \App\Models\Modele::all()->pluck('id')->toArray();
        foreach ($model_id as $value) {
            $count = rand(1, 5);
            for ($i=0; $i < $count; $i++) {
                \App\Models\Photo::factory()->create(
                    [
                        'forein_id' => $value
                    ]
                );
            }

        }
    }
}
