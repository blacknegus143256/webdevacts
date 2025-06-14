<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/users', [UserController::class, 'index']);
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
Route::post('/students/{id}/update', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);