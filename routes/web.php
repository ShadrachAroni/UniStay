<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
 

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::resource('users', \App\Http\Controllers\UsersController::class);
    Route::get('/Users/Admins', [AdminController::class, 'data'])->name('users.Admins');
    Route::get('/Users/Students', [UserController::class, 'data'])->name('users.Students');
    Route::get('/Users/Agents', [AgentController::class, 'data'])->name('users.Agents');
});

Route::middleware(['auth', 'isAgent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'index'])->name('agent.dashboard');
    Route::get('/agent/profile', [AgentController::class, 'profile'])->name('agent.profile');

});

Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
});

Route::put('profile/{user}', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});




