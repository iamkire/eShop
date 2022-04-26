<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/dashboard',[ProductController::class,'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');

Route::get('/', [ProductController::class,'index'])->name('welcome');
Route::get('search',[HomeController::class,'search'])->name('search');
Route::get('products/create',[ProductController::class,'create'])->name('products.create');
Route::post('products/store',[ProductController::class,'store'])->name('products.store');
Route::get('product/{product}',[ProductController::class,'show'])->name('products.show');
Route::get('products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::patch('products/{product}/update',[ProductController::class,'update'])->name('products.update');
Route::delete('products/{products}/delete',[ProductController::class,'destroy'])->name('products.delete');

Route::post('/addToCart/{product}',[HomeController::class,'addToCart'])->name('addToCart');
Route::get('showItems',[HomeController::class,'showItems'])->name('showItems');
Route::get('deleteItems/{product}',[HomeController::class,'deleteItems'])->name('deleteItems');
Route::post('order',[HomeController::class,'order'])->name('order');


Route::get('showOrder',[AdminController::class,'showOrder'])->name('showOrder');
Route::get('updateStatus/{order}',[AdminController::class,'updateStatus'])->name('update.status');
Route::get('dashboard/products',[AdminController::class,'products'])->name('admin.products');
Route::get('deleteOrder/{order}',[AdminController::class,'delete'])->name('delete.order');


Route::get('/products/category/{category}', [CategoryController::class, 'categoryProducts']);
Route::get('categories/create',[CategoryController::class,'create'])->name('createCategory');
Route::post('categories/store',[CategoryController::class,'store'])->name('addCategory');

Route::post('products/getTags',[TagController::class,'getTags']);

require __DIR__.'/auth.php';
