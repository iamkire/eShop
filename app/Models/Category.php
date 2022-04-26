<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $guarded=[];
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category', 'category_id', 'product_id')->withTimestamps();
    }
    public function getRouteKeyName()
    {
        return 'name';
    }
}
