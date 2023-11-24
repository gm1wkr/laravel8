<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'    => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:6', 'max:255'],
        ]);

        if(! auth()->attempt($attributes)) {
            throw ValidationException::withMessages(
                ['email' => 'The credentials provided are pretty crap, to be fair.']
            );
        }
        
        session()->regenerate();
        
        return redirect('/')->with('success', 'Welcome Back Again.');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Bye bye Manny.  Logged oot.');
    }
}
