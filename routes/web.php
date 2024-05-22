<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/categories',[CategorieController::class, 'index'])->name('categories.index');
Route::post('/categories',[CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/create',[CategorieController::class, 'create'])->name('categories.create');
Route::delete('/categories/{categorie}',[CategorieController::class, 'destroy'])->name('categories.destroy');
Route::put('/categories/{categorie}', [CategorieController::class,'update'])->name('categories.update');
Route::get('/categories/{categorie}/edit', [CategorieController::class,'edit'])->name('categories.edit');

require __DIR__.'/auth.php';
