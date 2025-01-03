<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'seller_id',
        'name',
        'pictures',
        'price',
        'inventory',
        'detail',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function sellers()
    {
        return $this->belongsTo(Seller::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function library()
    {
        return $this->hasMany(Library::class);
    }

    public function cartitems()
    {
        return $this->hasMany(CartItem::class, 'buyer_id');
    }

}
