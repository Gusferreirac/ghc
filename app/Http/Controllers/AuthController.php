<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function store(){
        $validated = request()->validate(
            [
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required| confirmed | min:8 ',
            'password_confirmation' => 'required',
            ]
        );

        //Criptografa a senha
        $validated['password'] = bcrypt($validated['password']);

        //Cria o usuario
        $user = User::create($validated);

        //Loga o usuario
        auth()->login($user);

        return redirect()->route('dashboard')->with('success', 'User created!');
    }

    public function authenticate(){
        $credentials = request()->validate(
            [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
            ]
        );

        if(auth()->attempt($credentials)){
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'User logged!');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
}
