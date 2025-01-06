<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Library;
class OrderController extends Controller
{
    public function summary($id)
    {
        $order = Order::with('orderDetails.product')->findOrFail($id);
        return view('summary', compact('order'));
    }



}
