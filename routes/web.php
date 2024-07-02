<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CabinetController;

Route::get('/', [IndexController::class, 'showPage'])->name('index');

Route::get('/signup', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::get('/signin', [AuthController::class, 'showLoginForm'])->name('login.form');

Route::post('/signup', [AuthController::class, 'register'])->name('register');
Route::post('/signin', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/orders/{id}', [OrdersController::class, 'showOrder'])->name('order');
    Route::get('/orders', [OrdersController::class, 'showPage'])->name('orders');
    Route::get('/cabinet', [CabinetController::class, 'showPage'])->name('cabinet');
    Route::post('/edit-name', [CabinetController::class, 'editName'])->name('edit.name');
    Route::post('/create-order', [OrdersController::class, 'createOrder'])->name('create.order');
    Route::post('/edit-order', [OrdersController::class, 'editOrder'])->name('edit.order');
});

Route::fallback(function() {
    return view('errors.404');
});
