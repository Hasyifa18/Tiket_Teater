<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('user.index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::resource('user', UserController::class);

Route::get('/user.create', [UserController::class, 'create'])->name('user.create');
Route::post('/user.store', [UserController::class, 'store'])->name('user.store');