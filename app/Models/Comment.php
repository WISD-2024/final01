<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'buyer_id', 'content'];

    public function buyers()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
}
