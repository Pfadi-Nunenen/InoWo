<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MealType;
use App\Models\Settings;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class OverwatchController extends Controller
{
    public function index()
    {
        $settings = Settings::first();
        $period = CarbonPeriod::create($settings->start_date, $settings->end_date);

        $meals = Meal::with('user')->get();
        print_r($meals);

        $mealTypes = MealType::all();

        $facturedMeals = [];
        foreach ($period as $date) {
            foreach ($mealTypes as $mealType) {
                $facturedMeals[$date->format('d.m.Y')][$mealType['id']] = 0;
            }
        }

        foreach($meals as $meal) {
            foreach($facturedMeals as $date => $mealTypes) {
                $mealDate = Carbon::parse($meal['meal_date'])->format('d.m.Y');

                if($date == $mealDate){
                    $facturedMeals[$mealDate][$meal['fk_meal_types']] += 1;
                }
            }
        }

        return view('overwatch.overwatch', ['meals' => $facturedMeals, 'rawMeals' => $meals]);
    }
}
