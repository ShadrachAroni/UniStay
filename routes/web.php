<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

 //admin group middleware 
 Route::middleware(['auth','App\Http\Middleware\Role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::get('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');


 });// End Group Admin middleware


 //agent group middleware 
 Route::middleware(['auth','App\Http\Middleware\Role:agent'])->group(function(){

 Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashborad');

 Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


 });// End Group Agent middleware

 Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');