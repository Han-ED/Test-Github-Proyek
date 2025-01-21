<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/NewProduct', function () {
    return view('NewProduct');
});

Route::get('/', [ProductController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/home', [ProductController::class, 'home']);
Route::get('/master', [ProductController::class, 'master']);
Route::get('/register', [ProductController::class, 'register'])->name('register');
Route::POST('/login', [ProductController::class, 'login'])->name('login');
Route::POST('/tambahProduk', [ProductController::class, 'create'])->name('product.create');
Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::put('/editProduk/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/update', [ProductController::class, 'update'])->name('product.update');
