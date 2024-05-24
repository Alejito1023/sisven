<?php

use App\Http\Controllers\api\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\PayModeController;
use App\Http\Controllers\api\CustomerController;




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

Route::get('/pay_modes',[PayModeController::class, 'index'])->name('pay_modes.index');
Route::post('/pay_modes',[PayModeController::class, 'store'])->name('pay_modes.store');
Route::get('/pay_modes/create',[PayModeController::class, 'create'])->name('pay_modes.create');
Route::delete('/pay_modes/{pay_mode}',[PayModeController::class, 'destroy'])->name('pay_modes.destroy');
Route::put('/pay_modes/{pay_mode}', [PayModeController::class,'update'])->name('pay_modes.update');
Route::get('/pay_modes/{pay_mode}/edit', [PayModeController::class,'edit'])->name('pay_modes.edit');

Route::get('/customers',[CustomerController::class, 'index'])->name('customers.index');
Route::post('/customers',[CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/create',[CustomerController::class, 'create'])->name('customers.create');
Route::delete('/customers/{customer}',[CustomerController::class, 'destroy'])->name('customers.destroy');
Route::put('/customers/{customer}', [CustomerController::class,'update'])->name('customers.update');
Route::get('/customers/{customer}/edit', [CustomerController::class,'edit'])->name('customers.edit');