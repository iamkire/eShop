<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $guarded = [];
    use HasFactory;
    public function scopeCountProducts($query,$user)
    {
        return $query->where('email', $user->email)->count();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_cart')
            ->withPivot(['quantity_ordered','price']);
    }
}
