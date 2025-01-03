<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

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

    public function cartitems()
    {
        return $this->hasMany(CartItem::class, 'buyer_id');
    }
}
