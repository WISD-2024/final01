@extends('layouts.app')

@section('title', '訂單摘要')

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-2xl font-bold mb-6">感謝您的購買</h1>
        <ul>
            @foreach($order->orderDetails as $detail)
                <li class="mb-4">
                    <img src="{{ asset('images/' . $detail->product->pictures) }}" alt="{{ $detail->product->name }}"
                         class="w-32 h-32 object-cover rounded-lg mr-4">
                    <span>{{ $detail->product->name }}</span>
                    <span>${{ number_format($detail->price, 2) }}</span>
                    <span>數量：{{ $detail->quantity }}</span>
                </li>
            @endforeach
        </ul>
        <p class="font-bold text-lg mt-6">
            總金額：${{ number_format($order->orderDetails->sum(function($detail) { return $detail->price * $detail->quantity; }), 2) }}</p>
    </div>
@endsection
