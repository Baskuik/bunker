<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;

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

// Dashboard (gebruikers)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin login pagina
Route::get('/adminlogin', [AdminAuthController::class, 'showLoginForm'])->name('admin.loginform');

// Admin login formulier verzenden
Route::post('/adminlogin', [AdminAuthController::class, 'login'])->name('admin.login');

// Admin logout
Route::post('/adminlogout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin routes (allemaal beveiligd)
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admindashboard', [AdminDashboardController::class, 'dashboard'])
    ->name('admin.admindashboard');


    // Openingstijden
    Route::get('/admin/openingstijden', [AdminDashboardController::class, 'openingstijden'])->name('admin.openingstijden');
    Route::post('/admin/openingstijden', [AdminDashboardController::class, 'updateOpeningstijden']);

    // Rondleidingen & kosten
    Route::get('/admin/rondleidingen', [AdminDashboardController::class, 'rondleidingen'])->name('admin.rondleidingen');
    Route::post('/admin/rondleidingen', [AdminDashboardController::class, 'updateRondleidingen']);

    // Tijden & max personen
    Route::get('/admin/tijden-max', [AdminDashboardController::class, 'tijdenMax'])->name('admin.tijdenMax');
    Route::post('/admin/tijden-max', [AdminDashboardController::class, 'updateTijdenMax']);

    // Rondleidingplanning
    Route::get('/admin/rondleidingplanning', [AdminDashboardController::class, 'planning'])->name('admin.planning');
});


Route::get('/test-admin', function () {
    return 'Middleware werkt!';
})->middleware('is_admin');


require __DIR__.'/auth.php';


