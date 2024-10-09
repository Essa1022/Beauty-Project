<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    // Admin routes
    Route::get('/', [UserController::class, 'index'])->name('admin.index');
    Route::get('/{user}', [UserController::class, 'show'])->name('admin.show');
    Route::post('/', [UserController::class, 'store'])->name('admin.store')->withoutMiddleware('auth:sanctum');
    Route::put('/{user}', [UserController::class, 'update'])->name('admin.update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.destroy');

    // User-specific routes
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'deleteProfile'])->name('profile.delete');
});





