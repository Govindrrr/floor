<?php

use App\Http\Controllers\Frotend\PageController;
use App\Http\Controllers\Frotend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// frontend routes !!

Route::get('/google-login',[UserController::class, 'google_login'])->name('google_login');
Route::get('/google/login',[UserController::class, 'google_callback']);

Route::get('/',[PageController::class, 'home'])->name('home');
Route::get('shops',[PageController::class, 'shops'])->name('shops');
Route::get('products',[PageController::class, 'products'])->name('products');
Route::post('/vendor-request',[PageController::class, 'vendor_request'])->name('vendor-request');
Route::get('/compare',[PageController::class, 'Compare'])->name('compare');
Route::get('/vendor/{id}', [PageController::class, 'vendor'])->name('vendor');



// Route::get('/dashboard', function () {
//     return view('frontend.home');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/add-to-cart',[UserController::class, 'addtoCart'])->name('addtoCart');
    Route::get('/user/cart',[UserController::class, 'cart'])->name('cart');
    Route::post('/user/cart/{id}',[UserController::class, 'cartForm'])->name('cartUpdate');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/user-profile',[UserController::class, 'profile'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
