<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7', 'max:255', 'confirmed'],
        ]);

        User::create($attributes);

        return redirect('/')->with('success', 'Your account has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $userController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $userController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $userController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $userController)
    {
        //
    }
}
