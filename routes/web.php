<?php
use App\Http\Controllers\ProfileController;

Route::get('/', [ProfileController::class, 'index'])->name('home');
Route::get('/about', [ProfileController::class, 'about'])->name('about');