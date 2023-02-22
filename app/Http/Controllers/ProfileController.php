<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MealType;
use App\Models\Settings;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $uid = Auth::id();
        $user = User::find($uid)->first();

        $settings = Settings::first();
        $period = CarbonPeriod::create($settings->start_date, $settings->end_date);

        $meals = Meal::where('fk_users', '=', $uid)->get();

        return view('profile.profile', ['user' => $user, 'period' => $period, 'meals' => $meals]);
    }

    public function update()
    {

    }

    public function presence()
    {
        $uid = Auth::id();
        $user = User::find($uid)->first();

        $settings = Settings::first();
        $period = CarbonPeriod::create($settings->start_date, $settings->end_date);

        $meals = Meal::where('fk_users', '=', $uid)->get();

        return view('profile.presence', ['user' => $user, 'period' => $period, 'meals' => $meals]);
    }

    public function presenceSave(Request $request)
    {
        Meal::where('fk_users', '=', Auth::id())->delete();

        $morningMeal = MealType::where('name', 'LIKE', "Z'Morge")->first();
        $middayMeal = MealType::where('name', 'LIKE', "Z'Mittag")->first();
        $eveningMeal = MealType::where('name', 'LIKE', "Z'Nacht")->first();
        $takeawayMeal = MealType::where('name', 'LIKE', "Mitnäh")->first();

        $zmorge = $request->input('zmorge');
        $zmittag = $request->input('zmittag');
        $znacht = $request->input('znacht');
        $mitnae = $request->input('mitnae');

        if($zmorge) {
            foreach($zmorge as $key => $value) {
                $mealDate = Carbon::parse($key)->format('Y-m-d');

                Meal::create([
                    'fk_users' => Auth::id(),
                    'fk_meal_types' => $morningMeal->id,
                    'meal_date' => $mealDate
                ]);
            }
        }

        if($zmittag) {
            foreach($zmittag as $key => $value) {
                $mealDate = Carbon::parse($key)->format('Y-m-d');

                Meal::create([
                    'fk_users' => Auth::id(),
                    'fk_meal_types' => $middayMeal->id,
                    'meal_date' => $mealDate
                ]);
            }
        }

        if($znacht) {
            foreach($znacht as $key => $value) {
                $mealDate = Carbon::parse($key)->format('Y-m-d');

                Meal::create([
                    'fk_users' => Auth::id(),
                    'fk_meal_types' => $eveningMeal->id,
                    'meal_date' => $mealDate
                ]);
            }
        }

        if($mitnae) {
            foreach($mitnae as $key => $value) {
                $mealDate = Carbon::parse($key)->format('Y-m-d');

                Meal::create([
                    'fk_users' => Auth::id(),
                    'fk_meal_types' => $takeawayMeal->id,
                    'meal_date' => $mealDate
                ]);
            }
        }

        return redirect()->back()->with('message', 'Gespeichert');
    }
}
