<?php

use App\Http\Controllers\Admin\LokasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\UserEventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HistoriesController;
use App\Http\Controllers\User\OrderController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events/{event}', [UserEventController::class, 'show'])->name('events.show');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('events', EventController::class);
        Route::resource('tickets', TiketController::class);
        Route::resource('location', LokasiController::class);

        Route::get('/histories', [HistoriesController::class, 'index'])->name('histories.index');
        Route::get('/histories/{id}', [HistoriesController::class, 'show'])->name('histories.show');

        Route::get('/profile/settings', [AccountController::class, 'edit'])->name('profile.index');
        Route::put('/profile/settings', [AccountController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [AccountController::class, 'updatePassword'])->name('profile.password.update');
    });
});

require __DIR__ . '/auth.php';