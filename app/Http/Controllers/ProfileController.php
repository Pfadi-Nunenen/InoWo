<?php

namespace App\Http\Controllers;

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

        return view('profile.profile', ['user' => $user, 'period' => $period]);
    }

    public function update()
    {

    }
}
