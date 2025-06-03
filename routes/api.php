<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register'])->name('users.register');
Route::post('/login', [UserController::class, 'login'])->name('users.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');

    Route::get('/summary', [ExpenseController::class, 'summary'])->name('expenses.summary');
    Route::resource('expenses', ExpenseController::class)->only(['index', 'store', 'update', 'destroy']);
});