<?php

namespace Database\Seeders;

use App\Models\MealTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mealTypes = [
            "Z'Morge",
            "Z'Mittag",
            "Z'Nacht",
            "Mitnäh"
        ];

        foreach ($mealTypes as $type){
            MealTypes::create([
                'mealtype_name' => $type,
            ]);
        }
    }
}
