<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para Listings
Route::get('/', [ListingController::class, 'index'])->name('listings.index');  
Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
Route::post('/listings', [ListingController::class, 'store'])->name('listings.store'); 
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit');
Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('listings.update');
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy');
Route::get('/my-listings', [ListingController::class, 'myListings'])->name('listings.myListings')->middleware('auth');





require __DIR__.'/auth.php';
