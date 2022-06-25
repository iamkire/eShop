<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::middleware(['auth'])->group(function () {
    Route::get('/profile',[UserController::class,'index'])->name('users.index');
    Route::get('/profile/{user}',[UserController::class,'edit'])->name('users.edit');
    Route::put('profile/update',[UserController::class,'update'])->name('users.update');

    Route::post('email',[EmailController::class,'send'])->name('email.send');

    Route::get('/dashboard',[ProductController::class,'dashboard'])->name('dashboard');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('product/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('products/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{products}', [ProductController::class, 'destroy'])->name('products.delete');

    Route::get('orders',[AdminController::class,'showOrder'])->name('admin.order');
    Route::get('status/{order}',[AdminController::class,'updateStatus'])->name('order.status');
    Route::get('dashboard/products',[AdminController::class,'products'])->name('admin.products');
    Route::delete('delete/{order}',[AdminController::class,'delete'])->name('order.delete');

    Route::post('products/getTags',[TagController::class,'getTags']);

    Route::get('categories/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('categories/store',[CategoryController::class,'store'])->name('category.store');


    Route::post('create/{product}',[OrderController::class,'store'])->name('add-to-cart');
    Route::get('order',[OrderController::class,'show'])->name('order.count');
    Route::post('order',[OrderController::class,'order'])->name('order.show');
    Route::get('delete/{order}',[OrderController::class,'delete'])->name('order.delete');
    Route::get('search',[HomeController::class,'search'])->name('search');


    Route::post('/comments/{product}' ,[CommentController::class,'store'])->name('comments.store');
    Route::get('comments/{comment}',[CommentController::class,'edit'])->name('comments.edit');
    Route::put('comments/{product}/{comment}',[CommentController::class,'update'])->name('comments.update');
    Route::delete('comments/{comment}',[CommentController::class,'delete'])->name('comments.delete');
});
Route::get('/', [ProductController::class,'index'])->name('welcome');
Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');


Route::get('/products/category/{category}', [CategoryController::class, 'sortBy']);
require __DIR__.'/auth.php';
