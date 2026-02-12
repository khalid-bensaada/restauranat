<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AvailabilityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;


Route::get('/', [RestaurantController::class, 'index'])->name('restauranteus.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('restaurateurs')->name('restaurateurs.')->group(function () {
        Route::get('/create', [RestaurantController::class, 'create'])->name('create');
        Route::post('/store', [RestaurantController::class, 'store'])->name('store');


        Route::get('/{restaurant}/edit', [RestaurantController::class, 'edit'])->name('edit');
        Route::put('/{restaurant}', [RestaurantController::class, 'update'])->name('update');
        Route::delete('/{restaurant}', [RestaurantController::class, 'destroy'])->name('destroy');
    });
});


Route::post('/favorites/{id}', [FavoriteController::class, 'toggle'])
    ->middleware(['auth'])
    ->name('favorites.toggle');

Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'store'])->name('restaurants.create');

Route::get('/client', [RestaurantController::class, 'indexx'])->name('client.index');



Route::get('/reservation/{restaurantId}', [ReservationController::class, 'create'])
    ->name('reservation.create');

Route::post('/reservation', [ReservationController::class, 'store'])
    ->name('reservation.store');


// routes/web.php
Route::post('restaurateurs/{restaurant}/availabilities', [AvailabilityController::class, 'store'])
    ->name('availabilities.store');


Route::get('/checkout/{reservation}', [PaymentController::class, 'checkout'])->name('payments.checkout');

Route::get('/payment/success', [PaymentController::class, 'success'])->name('payments.success');

Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payments.cancel');

Route::post('/stripe/webhook', [PaymentController::class, 'webhook']);

require __DIR__ . '/auth.php';
