<?php

namespace App\Http\Controllers;

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
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        throw_unless(
            auth()->attempt($attributes),
            ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ])
        );

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return back()->with('success', 'Goodbye!');
    }
}
