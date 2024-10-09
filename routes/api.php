<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    require __DIR__. '/user.php';
    require __DIR__. '/auth.php';
});
