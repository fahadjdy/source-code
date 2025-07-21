<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\Admin;


Route::get('/', [Home::class, 'index'])->name('home');
Route::get('/about', [Home::class, 'about'])->name('about');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'attemptLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('profile', [Admin::class, 'profile'])->name('admin.profile');
    Route::post('profile/{id}', [Admin::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('dashboard', [Admin::class, 'dashboard'])->name('admin.dashboard');
});
