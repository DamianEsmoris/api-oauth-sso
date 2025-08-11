<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'RegisterForm'])
    ->name('register');

Route::get('/login', [AuthController::class, 'LoginForm'])
    ->name('login');

Route::post('/register', [AuthController::class, 'Register']);

Route::post('/login', [AuthController::class, 'Login']);

Route::get('/logout', [AuthController::class, 'Logout']);
