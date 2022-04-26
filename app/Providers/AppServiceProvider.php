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
        //
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
    }
}
