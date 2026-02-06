<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FavoriteController;


Route::get('/', [RestaurantController::class, 'index'])->name('restauranteus.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/restaurateurs/create', [RestaurantController::class, 'create'])
    ->name('restaurateurs.create');

Route::post('/restaurateurs', [RestaurantController::class, 'store'])
    ->name('restaurateurs.store');


Route::post('/favorites/{id}', [FavoriteController::class, 'toggle'])
    ->middleware(['auth', 'client'])
    ->name('favorites.toggle');

Route::get(
    '/restaurants/{restaurant}',
    [RestaurantController::class, 'show']
)
    ->name('restaurants.show');


require __DIR__ . '/auth.php';
