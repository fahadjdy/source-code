<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;


Route::get('/', [Home::class, 'index'])->name('home');
Route::get('/about', [Home::class, 'about'])->name('about');
