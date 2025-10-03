<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

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
// Admin login pagina
Route::get('/adminlogin', [AdminAuthController::class, 'showLoginForm'])->name('admin.loginform');

// Admin login formulier verzenden
Route::post('/adminlogin', [AdminAuthController::class, 'login'])->name('admin.login');

// Admin logout
Route::post('/adminlogout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/adminpanel', function () {
    $user = auth()->user();

    if (!$user || !$user->is_admin) {
        abort(403); // geen toegang voor niet-admins
    }

    return view('auth.adminpanel'); // dit wordt je admin panel Blade
})->middleware('auth'); // checkt of iemand ingelogd is





require __DIR__.'/auth.php';


