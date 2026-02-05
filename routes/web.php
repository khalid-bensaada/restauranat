<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;



Route::get('/', [RestaurantController::class, 'index'])->name('restauranteus.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('restauranteurs')->group(function () {
    Route::get('/restauranteurs', [RestaurantController::class, 'create'])->name('restauranteurs.create');
});


require __DIR__ . '/auth.php';
