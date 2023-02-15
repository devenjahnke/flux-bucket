<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(\route('login'));
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/menu', [\App\Http\Controllers\Customer\ProductController::class, 'index'])->name('menu');
    Route::patch('/user/favorite-product', \App\Http\Controllers\Customer\FavoriteProductController::class)->name('user.favorite-product');
    Route::patch('/cart', [\App\Http\Controllers\Customer\CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart', [\App\Http\Controllers\Customer\CartController::class, 'destroy'])->name('cart.delete');
    Route::get('/orders', [\App\Http\Controllers\Customer\OrderController::class, 'index'])->name('order.index');
    Route::post('/orders', [\App\Http\Controllers\Customer\OrderController::class, 'store'])->name('order.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
