<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ManagerAuthController;

Route::get('/manager/login', [ManagerAuthController::class, 'showLogin'])->name('manager.login.form');
Route::post('/manager/login', [ManagerAuthController::class, 'login'])->name('manager.login.submit');
Route::post('/manager/logout', [ManagerAuthController::class, 'logout'])->name('manager.logout');
Route::get('/manager/register', [ManagerAuthController::class, 'showRegisterForm'])->name('manager.register');
Route::post('/manager/register', [ManagerAuthController::class, 'register'])->name('manager.register.submit');
// Protect student routes
Route::middleware('auth:manager')->group(function () {
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/users', [UserController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
Route::post('/students/{id}/update', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);
});
Route::get('/', function () {
    return view('./Managers/Login');
});
