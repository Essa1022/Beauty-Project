<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index')->withoutMiddleware('auth:sanctum');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
});
