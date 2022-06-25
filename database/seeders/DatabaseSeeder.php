<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $tags =Tag::factory(5)->create();
        $categories = Category::factory(5)->create();

        User::factory(1)->create()->each(function () use($tags){
            Product::factory(10)->create()
            ->each(function($products) use ($tags){
                $products->tags()->attach($tags->random(2));
            });
        });

        Product::factory(10)->create()
            ->each(function($products) use ($categories){
                $products->categories()->attach($categories->random(2));
            });
    }
}
