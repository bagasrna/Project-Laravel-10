<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArtisanController;

Route::group(['prefix' => 'artisan'], function () {
    Route::get('/key', [ArtisanController::class, 'key']);
    Route::get('/seed', [ArtisanController::class, 'seed']);
    Route::get('/fresh', [ArtisanController::class, 'fresh']);
    Route::get('/cache', [ArtisanController::class, 'cache']);
    Route::get('/storage', [ArtisanController::class, 'storage']);
    Route::get('/optimize', [ArtisanController::class, 'optimize']);
    Route::get('/user', [ArtisanController::class, 'user']);
    Route::get('/user/create', [ArtisanController::class, 'userCreate']);
});
