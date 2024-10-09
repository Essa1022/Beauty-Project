<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login'])->name('login')->withoutMiddleware('auth:sanctum');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');






