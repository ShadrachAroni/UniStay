<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home',[DashboardController::class, 'index']);
});


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', \App\Http\Controllers\UsersController::class);
});

Route::middleware(['auth', 'isAgent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'index'])->name('agent.dashboard');
});

Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});

Route::get('/home', [DashboardController::class, 'index'])->name('home');




