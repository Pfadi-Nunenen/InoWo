<?php

namespace App\Http\Controllers;

use App\Models\Meals;
use App\Models\Settings;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $uid = Auth::id();
        $user = User::find($uid)->first();

        $settings = Settings::first();
        $period = CarbonPeriod::create($settings->start_date, $settings->end_date);

        $meals = Meals::where('fk_user', '=', $uid)->get();

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
}
