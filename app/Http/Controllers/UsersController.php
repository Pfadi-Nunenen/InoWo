<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if($request->input('search') == null) {
            $users = User::all();
        } else {
            $search_string = $request->input('search');
            $users = User::where('scout_name', 'LIKE', "%$search_string%")
                ->orWhere('first_name', 'LIKE', "%$search_string%")
                ->orWhere('last_name', 'LIKE', "%$search_string%");
        }

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.add');
    }

    public function store(Request $request)
    {
        $scout_name = $request->input('scout_name');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');

        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

        if ($password_confirmation != null && $password === $password_confirmation) {
            $password = Hash::make($password);

            $password_repeat = null;

            User::create([
                'scout_name' => $scout_name,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $password,
            ]);

            return redirect()->back()->with('message', 'Benutzer wurde erstellt.');
        } else {
            return redirect()->back()->with('error', 'Passwort wurde nicht korrekt wiederholt!');
        }
    }

    public function edit($uid)
    {
        $user = User::where('id', '=', $uid);

        return view('users.edit', ['user' => $user]);
    }

    public function update($uid, Request $request)
    {
        $scout_name = $request->input('scout_name');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');

        $password = $request->input('password');
        $password_repeat = $request->input('password_repeat');

        if ($password != null && $password === $password_repeat) {
            $password = Hash::make($password);

            $password_repeat = null;

            User::where('id', '=', $uid)->update([
                'scout_name' => $scout_name,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $password,
            ]);

            return redirect()->back()->with('message', 'Benutzer wurde aktualisiert.');
        } elseif($password == null) {
            User::where('id', '=', $uid)->update([
                'scout_name' => $scout_name,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
            ]);

            return redirect()->back()->with('message', 'Benutzer wurde aktualisiert. Das Passwort wurde beibehalten!');
        } else {
            return redirect()->back()->with('error', 'Passwort wurde nicht korrekt wiederholt!');
        }
    }

    public function destroy($uid)
    {
        User::destroy($uid);

        return redirect()->back()->with('message', 'Benutzer erfolgreich gelöscht.');
    }
}
