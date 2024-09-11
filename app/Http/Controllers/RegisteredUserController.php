<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth/register');
    }

    public function store()
    {
        //validate
        $validatedAttributes = request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(3), 'confirmed']
        ]);

        //create the user
        $user = User::create($validatedAttributes);

        //log in
        Auth::login($user);

        //redirect
        return redirect('/');
    }
}




