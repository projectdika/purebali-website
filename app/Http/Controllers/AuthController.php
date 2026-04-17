<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "string"],
            "password" => ["required", "string"]
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withInput($request->only('email'))->withErrors([
            'email' => 'Email atau password salah!'
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'max:20'],
        ]);

        User::create([
            "name" => $validate['name'],
            "email" => $validate['email'],
            "phone_number" => $validate['phone_number'],
            "password" => Hash::make($validate['password'])
        ]);

        return redirect('/login');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
