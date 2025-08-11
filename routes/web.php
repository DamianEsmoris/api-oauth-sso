<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/register', fn () => view('register'))
    ->name('register');

Route::get('/login', fn () => view('login'))
    ->name('login');

Route::post('/register', function(Request $request) {
    $user = new User();
    $user->name = $request->post("name");
    $user->email = $request->post("email");
    $user->password = Hash::make($request->post("password"));

    try {
        $user->save();
    } catch (Exception) {
        return back()->with('error', 'Email already been taken');
    }

    return $user;
});

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended();
    }

    return back()->with('error', 'Invalid credentails');
});
