<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('auth.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:100'],
            'email' => ['required','string','email','unique:users'],
            'password' => ['required',Password::default()],
        ]);

        // User in die DB schreiben
        $user = User::create([
            'name'     => $request->name,  // $request->input('name')
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Einloggen
        Auth::login($user);

        return redirect('/')->with('success','Erfolgreich registriert und eingeloggt!');
    }
}
