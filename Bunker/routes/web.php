<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\IsAdmin;

// ------------------------
// Publieke pagina's
// ------------------------

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/over', function () {
    return view('over');
})->name('over');

Route::get('/verhaal', function () {
    return view('verhaal');
})->name('verhaal');

Route::get('/rondleiding', function () {
    return view('rondleiding');
})->name('rondleiding');

Route::get('/boeken', function () {
    return view('boeken');
})->name('boeken');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// ------------------------
// Dashboard (gebruikers)
// ------------------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ------------------------
// Admin login
// ------------------------

Route::get('/adminlogin', [AdminAuthController::class, 'showLoginForm'])->name('admin.loginform');
Route::post('/adminlogin', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/adminlogout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ------------------------
// Admin routes (met prefix en middleware)
// ------------------------

Route::prefix('admin')->middleware(['auth', IsAdmin::class])->name('admin.')->group(function () {

    // Dashboard (oude route naam behouden)
    Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('admindashboard');

    // Openingstijden
    Route::get('/openingstijden', [AdminDashboardController::class, 'openingstijden'])->name('openingstijden');
    Route::post('/openingstijden', [AdminDashboardController::class, 'updateOpeningstijden']);

    // Rondleidingen & kosten
    Route::get('/rondleidingen', [AdminDashboardController::class, 'rondleidingen'])->name('rondleidingen');
    Route::post('/rondleidingen', [AdminDashboardController::class, 'updateRondleidingen']);

    // Tijden & max personen
    Route::get('/tijden-max', [AdminDashboardController::class, 'tijdenMax'])->name('tijdenMax');
    Route::post('/tijden-max', [AdminDashboardController::class, 'updateTijdenMax']);

    // Rondleidingplanning
    Route::get('/rondleidingplanning', [AdminDashboardController::class, 'planning'])->name('planning');
});

// ------------------------
// Test route voor admin middleware
// ------------------------
Route::get('/test-admin', function () {
    return 'Admin middleware werkt!';
})->middleware([IsAdmin::class]);

require __DIR__.'/auth.php';
