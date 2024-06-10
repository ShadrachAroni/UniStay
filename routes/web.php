<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('auth:admin');
});

Route::middleware('agent:agent')->group(function(){
    Route::get('agent/login',[AgentController::class, 'loginForm']);
    Route::post('agent/login',[AgentController::class, 'store'])->name('agent.login');
});

Route::middleware(['auth:sanctum,agent',config('jetstream.auth_session'),'verified',
])->group(function () {
    Route::get('/agent/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('auth:agent');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
