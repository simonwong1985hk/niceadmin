<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:7', 'max:255'],
            'terms' => ['accepted'],
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        auth()->login(User::create($attributes));

        return redirect('/');
    }
}
