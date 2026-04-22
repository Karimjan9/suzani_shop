<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.attempt');

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::middleware(['auth', 'admin'])->group(function (): void {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

        Route::get('/{resource}', [ResourceController::class, 'index'])->name('resources.index');
        Route::get('/{resource}/create', [ResourceController::class, 'create'])->name('resources.create');
        Route::post('/{resource}', [ResourceController::class, 'store'])->name('resources.store');
        Route::get('/{resource}/{record}/edit', [ResourceController::class, 'edit'])->name('resources.edit');
        Route::put('/{resource}/{record}', [ResourceController::class, 'update'])->name('resources.update');
        Route::delete('/{resource}/{record}', [ResourceController::class, 'destroy'])->name('resources.destroy');
    });
});
