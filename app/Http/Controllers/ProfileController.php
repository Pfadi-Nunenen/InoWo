<?php

namespace App\Http\Controllers;

use App\Models\Meal;
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
        $uid = Auth::id();

        $zmorge = $request->input('zmorge');
        $zmittag = $request->input('zmittag');
        $znacht = $request->input('znacht');
        $mitnae = $request->input('mitnae');

        foreach($zmorge as $key => $value) {
            print_r($key);
            $meal = new Meal();
            $meal->user($uid);
            $meal->mealTypes();
        }
    }
}
