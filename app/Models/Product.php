<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_product',
        'description',
        'price',
        'quantity',
        'image',
        'id_category',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
