<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
    Route::get('/{service}', [CommentController::class, 'getApprovedComments'])->name('approved');
    Route::get('/admin/all', [CommentController::class, 'getAllComments'])->name('all');
    Route::post('/{service}/{comment?}', [CommentController::class, 'store'])->name('store');
    Route::put('/{comment}', [CommentController::class, 'changeStatus'])->name('changeStatus');
    Route::delete('/{comment}', [CommentController::class, 'delete'])->name('delete');
});




