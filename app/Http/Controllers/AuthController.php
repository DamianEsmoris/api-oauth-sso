<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;

class AuthController extends Controller
{
    public static function LoginForm()
    {
        return view('auth.login');
    }

    public static function RegisterForm()
    {
        return view('auth.register');
    }

    public static function Register(Request $request)
    {
        try {
            UserController::Register($request);
        } catch (Exception) {
            return back()->with('error', 'Email already been taken');
        }
        $request->session()->regenerate();
        return redirect()->intended();
    }

    public static function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->with('error', 'Invalid credentails');
    }

    public static function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $uri = $request->get('redirect_uri') ?? '/';
        return redirect($uri);
    }
}
