<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Указываем поля таблицы (без поля id, created_at и updated_at)
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'discount',
        'category_id',
    ];

    // Связь с моделью Category M:1
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Связь с моделью Photo 1:M
    public function photos() {
        return $this->hasMany(Photo::class);
    }

    // Связь с моделью Item 1:M
    public function items() {
        return $this->hasMany(Item::class);
    }

    // Связь с моделью Cart 1:M
    public function carts() {
        return $this->hasMany(Cart::class);
    }
}
