<?php

use App\Http\Controllers\Frotend\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// frontend routes !!

Route::get('/',[PageController::class, 'home'])->name('home');
Route::post('/vendor-request',[PageController::class, 'vendor_request'])->name('vendor-request');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
