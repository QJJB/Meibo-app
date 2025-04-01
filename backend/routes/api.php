<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->get('/projects', [ProjectController::class, 'showAll']);
Route::middleware(['auth:sanctum'])->get('/projects/{id}', [ProjectController::class, 'show']);
Route::middleware(['auth:sanctum'])->post('/projects', [ProjectController::class, 'create']);
Route::middleware(['auth:sanctum'])->put('/projects/{id}', [ProjectController::class, 'update']);
Route::middleware(['auth:sanctum'])->delete('/projects/{id}', [ProjectController::class, 'delete']);

Route::middleware(['auth:sanctum'])->get('/home/{id}/newtask', [ProjectController::class, 'newTask']);
Route::middleware(['auth:sanctum'])->post('/home/{id}/newtask', [ProjectController::class, 'taskCreate']);