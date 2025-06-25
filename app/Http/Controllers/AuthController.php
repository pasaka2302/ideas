<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {

        $validated = request()->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        try {
            $user = User::create(
                [
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => Hash::make($validated['password'])
                ]
            );
        } catch (\Exception $e) {
            Log::error('Failed to create new user' . $e->getMessage());
            return redirect()->back()->withErrors(['name' => "Failed to create new user. Please try again Letter"]);
        }

        // Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('login')->with('flash', 'Account Created Successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        //   dd(request()->all());
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validated)) {
            $name = auth()->user()->name;
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('flash', "You are now logged in Successfuly as {$name}");
        }

        return back()->withErrors([
            'email' => "Oops, the provided confidentials does not match our records!"
        ])->onlyInput('email');
    }

    public function logout()
    {

        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('flash', 'You have logged out Successfully!');
    }
}
