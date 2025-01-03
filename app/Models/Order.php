<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'seller_id',
        'date',
        'score',
        'comment',
        'pay',
        'price',
    ];

    public function buyers()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }

    public function sellers()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
