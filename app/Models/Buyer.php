<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Buyer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function library()
    {
        return $this->hasMany(Library::class, 'buyer_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'buyer_id');
    }
}
