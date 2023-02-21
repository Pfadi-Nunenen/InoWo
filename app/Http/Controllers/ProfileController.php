<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MealType;
use App\Models\Settings;
use App\Models\User;
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

        $meals = Meal::where('fk_user', '=', $uid)->get();

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

        return view('profile.presence', ['user' => $user, 'period' => $period]);
    }

    public function presenceSave(Request $request)
    {
        $user = User::find(Auth::id());
        $morningMeal = MealType::where('name', 'LIKE', "Z'Morge'")->first();
        $middayMeal = MealType::where('name', 'LIKE', "Z'Mittag")->first();
        $eveningMeal = MealType::where('name', 'LIKE', "Z'Nacht")->first();
        $takeawayMeal = MealType::where('name', 'LIKE', "Mitnäh")->first();

        $zmorge = $request->input('zmorge');
        $zmittag = $request->input('zmittag');
        $znacht = $request->input('znacht');
        $mitnae = $request->input('mitnae');

        foreach($zmorge as $key => $value) {
            print_r($key);
            $meal = new Meal();
            $meal->user($user);
            $meal->mealTypes($morningMeal);
            $meal->save();
        }

        foreach($zmittag as $key => $value) {
            print_r($key);
            $meal = new Meal();
            $meal->user($user);
            $meal->mealTypes();
            $meal->save();
        }

        foreach($znacht as $key => $value) {
            print_r($key);
            $meal = new Meal();
            $meal->user($user);
            $meal->mealTypes();
            $meal->save();
        }

        foreach($mitnae as $key => $value) {
            print_r($key);
            $meal = new Meal();
            $meal->user($user);
            $meal->mealTypes();
            $meal->save();
        }
    }
}
