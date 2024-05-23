<?php

use App\Http\Controllers\api\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('categories',[CategorieController::class, 'store'])->name('categories.store');
Route::get('categories',[CategorieController::class, 'index'])->name('categories');
Route::delete('/categories/{categorie}',[CategorieController::class, 'destroy'])->name('categories.destroy');
Route::put('/categories/{categorie}', [CategorieController::class,'show'])->name('categories.show');
Route::put('/categories/{categorie}', [CategorieController::class,'update'])->name('categories.update');

Route::get('/products',[ProductController::class, 'index'])->name('products.index');
Route::post('/products',[ProductController::class, 'store'])->name('products.store');
Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
Route::delete('/products/{product}',[ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{product}', [ProductController::class,'update'])->name('products.update');
Route::get('/products/{product}/edit', [ProductController::class,'edit'])->name('products.edit');
