<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeaterController;
use App\Http\Controllers\UserController;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('user.index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::resource('user', UserController::class);

Route::get('/user.create', [UserController::class, 'create'])->name('user.create');
Route::post('/user.store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

Route::resource('teater', TeaterController::class);

Route::get('/teater.create', [TeaterController::class, 'create'])->name('teater.create');
Route::post('/teater.store', [TeaterController::class, 'store'])->name('teater.store');
Route::get('/teater/{id}/edit', [TeaterController::class, 'edit'])->name('teater.edit');
Route::put('/teater/{id}', [TeaterController::class, 'update'])->name('teater.update');
Route::get('/teater/{id}', [TeaterController::class, 'show'])->name('teater.show');

Route::resource('booking', BookingController::class);

Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
Route::get('booking/list', [BookingController::class, 'list'])->name('booking.list');
Route::get('booking/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('booking/{booking}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
