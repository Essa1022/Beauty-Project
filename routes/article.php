<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'article', 'as' => 'article.'], function() {
    Route::get('/', [ArticleController::class, 'index'])->name('index')->withoutMiddleware('auth:sanctum');
    Route::get('/{article}', [ArticleController::class, 'show'])->name('show')->withoutMiddleware('auth:sanctum');
    Route::get('/admin/all', [ArticleController::class, 'adminIndex'])->name('adminIndex');
    Route::get('/admin/{article}', [ArticleController::class, 'adminShow'])->name('adminShow');
    Route::post('/', [ArticleController::class, 'store'])->name('store');
    Route::put('/{article}', [ArticleController::class, 'update'])->name('update');
    Route::delete('/{article}', [ArticleController::class, 'delete'])->name('delete');
});







