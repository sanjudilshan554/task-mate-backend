<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/last-saved-task', [TaskController::class, 'lastSavedTask']);
Route::get('/get/{id}', [TaskController::class, 'get']);
Route::put('/update/{id}', [TaskController::class, 'update']);
Route::delete('/delete/{id}', [TaskController::class, 'delete']);
