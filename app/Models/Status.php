<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // Указываем поля таблицы (без поля id, created_at и updated_at)
    protected $fillable = [
        'name',
        'code',
    ];

    // Связь с моделью Order 1:M
    public function orders() {
        return $this->hasMany(Order::class);
    }
}
