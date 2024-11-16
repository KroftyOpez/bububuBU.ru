<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    // Указываем поля таблицы (без поля id, created_at и updated_at)
    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'sex',
        'birthday',
        'email',
        'password',
        'nickname',
        'avatar',
        'phone',
        'api_token',
        'role_id',
    ];

    // Список полей для скрытия
    protected $hidden = [
        'password',
        'api_token',
    ];

    // Список полей для преобразования
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Связь с моделью Role M:1
    public function role()  {
        return $this->belongsTo(Role::class);
    }

    // Связь с моделью Address 1:M
    public function addresses()  {
        return $this->hasMany(Address::class);
    }

    // Связь с моделью Cart 1:M
    public function carts() {
        return $this->hasMany(Cart::class);
    }

    // Связь с моделью Order 1:M
    public function orders() {
        return $this->hasMany(Order::class);
    }
}
