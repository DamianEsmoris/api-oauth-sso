<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/validate',[UserController::class,"ValidateToken"])->middleware('auth:api');
