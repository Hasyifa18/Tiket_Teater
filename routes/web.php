<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\TeaterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User2Controller;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('index');

Auth::routes();

Route::get('user.index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::resource('user', UserController::class);
Route::resource('user2', User2Controller::class);
Route::get('hasil', [User2Controller::class, 'hasil'])->name('hasil');
Route::get('checkout/{id}', [User2Controller::class, 'checkout'])->name('checkout');
Route::get('detail/{id}', [User2Controller::class, 'detail'])->name('detailT');

Route::post('store/bukti', [User2Controller::class, 'store2'])->name('storeBukti');

// Route::get('/user.create', [UserController::class, 'create'])->name('user.create');
// Route::post('/user.store', [UserController::class, 'store'])->name('user.store');
// Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
// Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

Route::resource('teater', TeaterController::class);

// Route::get('/teater.create', [TeaterController::class, 'create'])->name('teater.create');
// Route::post('/teater.store', [TeaterController::class, 'store'])->name('teater.store');
// Route::get('/teater/{id}/edit', [TeaterController::class, 'edit'])->name('teater.edit');
// Route::put('/teater/{id}', [TeaterController::class, 'update'])->name('teater.update');
// Route::get('/teater/{id}', [TeaterController::class, 'show'])->name('teater.show');

Route::resource('booking', BookingController::class);

// Route::get('/booking.create', [BookingController::class, 'create'])->name('booking.create');
// Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
// Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
// Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
// Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');