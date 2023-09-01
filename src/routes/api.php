<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArtisanController;
use App\Http\Controllers\Api\FileUploadController;

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

Route::get('/get-file', [FileUploadController::class, 'getFileToCloud']);
Route::post('/upload-file', [FileUploadController::class, 'uploadFileToCloud']);