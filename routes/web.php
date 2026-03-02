<?php

use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:2'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin_dashboard');
    })->name('dashboard');
    Route::resource('colocations', ColocationController::class);
});
Route::middleware(['auth', 'role:1'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', function () {
    return view('user_dashboard');
})->name('dashboard');
    Route::get('/colocations', [ColocationController::class, 'index'])->name('colocations.index');
});

// Route::get('/user/dashboard', function () {
//     return view('user_dashboard');
// })->middleware(['auth', 'verified'])->name('user_dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
