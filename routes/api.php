<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Task
Route::prefix('task')->group(function () {
    Route::get('/all', [TaskController::class, 'all']);
    Route::post('/store', [TaskController::class, 'store']);
    Route::get('/last-saved-task', [TaskController::class, 'lastSavedTask']);
    Route::get('/get/{id}', [TaskController::class, 'get']);
    Route::put('/update/{id}', [TaskController::class, 'update']);
    Route::delete('/delete/{id}', [TaskController::class, 'delete']);
    Route::get('/complete/{id}', [TaskController::class, 'complete']);
});

// User
Route::prefix('user')->group(function () {
    Route::post('/store', [UserController::class, 'store']);
    Route::post('/login', [UserController::class, 'login']);
    Route::put('/update/{id}', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'delete']);
});


