<?php

use App\Http\Controllers\api\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('categories',[CategorieController::class, 'store'])->name('categories.store');
Route::get('categories',[CategorieController::class, 'index'])->name('categories');
Route::delete('/categories/{categorie}',[CategorieController::class, 'destroy'])->name('categories.destroy');
Route::put('/categories/{categorie}', [CategorieController::class,'show'])->name('categories.show');
Route::put('/categories/{categorie}', [CategorieController::class,'update'])->name('categories.update');
