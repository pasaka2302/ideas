<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
        
        $validated = request()->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);             
        
        $user = User::create(
            [
            'name' => $validated['name'],
             'email' => $validated['email'],
             'password' => Hash::make($validated['password'])
        ]);

        // Mail::to($user->email)->send(new WelcomeEmail($user));

      return redirect()->route('dashboard')->with('flash', 'Account Created Successfully!');
    }

     public function login(){
        return view('auth.login');
    }

    public function authenticate(){
    //   dd(request()->all());
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($validated)){

            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('flash', 'You are now logged in Successfuly!');

        }

      return redirect()->route('login')->withErrors([
        'email' => "Oops, Incorect email!",
        'password' => "Oops, Incorect Password!"
      ]);

    }

    public function logout(){

        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('flash', 'You have logged out Successfully!');
    }
}