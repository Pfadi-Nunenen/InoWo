<?php

namespace Database\Seeders;

use App\Models\MealType;
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
            MealType::create([
                'meal_types_name' => $type,
            ]);
        }
    }
}
