<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Over ons
Route::get('/over', function () {
    return view('over');
})->name('over');

// Verhaal
Route::get('/verhaal', function () {
    return view('verhaal');
})->name('verhaal');

// Rondleiding
Route::get('/rondleiding', function () {
    return view('rondleiding');
})->name('rondleiding');

// Boeken
Route::get('/boeken', function () {
    return view('boeken');
})->name('boeken');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
