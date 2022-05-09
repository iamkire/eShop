<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard',[ProductController::class,'dashboard'])->name('dashboard');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('product/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('products/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{products}', [ProductController::class, 'destroy'])->name('products.delete');

    Route::get('showOrder',[AdminController::class,'showOrder'])->name('showOrder');
    Route::get('updateStatus/{order}',[AdminController::class,'updateStatus'])->name('update.status');
    Route::get('dashboard/products',[AdminController::class,'products'])->name('admin.products');
    Route::get('deleteOrder/{order}',[AdminController::class,'delete'])->name('delete.order');

    Route::post('products/getTags',[TagController::class,'getTags']);

    Route::get('categories/create',[CategoryController::class,'create'])->name('createCategory');
    Route::post('categories/store',[CategoryController::class,'store'])->name('addCategory');

});
Route::get('/', [ProductController::class,'index'])->name('welcome');

Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');

Route::get('search',[HomeController::class,'search'])->name('search');

Route::post('create/{product}',[OrderController::class,'store'])->name('add-to-cart');
Route::get('order',[OrderController::class,'show'])->name('show.count');
Route::post('order',[OrderController::class,'order'])->name('show.order');
Route::get('delete/{order}',[OrderController::class,'delete'])->name('delete.order');

Route::get('/products/category/{category}', [CategoryController::class, 'sortBy']);



require __DIR__.'/auth.php';
