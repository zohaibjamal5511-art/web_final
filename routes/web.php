<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Guest Landing Page
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('landing');

// Guest Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated User Workspace Routes (Moved to /work)
Route::middleware('auth')->group(function () {
    Route::get('/work', [PlatformController::class, 'dashboard'])->name('dashboard');
    Route::post('/generate-ideas', [PlatformController::class, 'generateIdeas'])->name('ideas.generate');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Hardcoded Administrative Access Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});