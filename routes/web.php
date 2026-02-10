<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.show');

require __DIR__ . '/auth.php';