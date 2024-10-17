<?php


use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'favorite', 'as' => 'favorite.'], function () {
    Route::get('/articles', [FavoriteController::class, 'getFavoriteArticles'])->name('articles');
    Route::get('/services', [FavoriteController::class, 'getFavoriteServices'])->name('services');
    Route::post('/toggle/{type}/{id}', [FavoriteController::class, 'toggleFavorite'])->name('toggle');
});





