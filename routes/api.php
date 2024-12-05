<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/list', [UserController::class, 'getList']);
});
