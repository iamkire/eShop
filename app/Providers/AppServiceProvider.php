<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGateway::class,function($app){
            return new PaymentGateway('mkd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('category.category', function($view){
            $view->with('categories',Category::has('products')->pluck('name'));
        });
        view()->composer('welcome', function($view){
            $view->with('categories',Category::has('products')->pluck('name'));
        });
        view()->composer('products.product', function($view){
            $view->with('categories',Category::has('products')->pluck('name'));
        });
        view()->composer('users.index', function($view){
            $view->with('categories',Category::has('products')->pluck('name'));
        });
        view()->composer('users.edit', function($view){
            $view->with('categories',Category::has('products')->pluck('name'));
        });
        view()->composer('cart.show', function($view){
            $view->with('categories',Category::has('products')->pluck('name'));
        });
        view()->composer('comments.edit', function($view){
            $view->with('categories',Category::has('products')->pluck('name'));
        });
    }
}
