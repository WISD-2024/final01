@extends('layouts.app')

@section('title', '結算頁面')

@section('content')
    <div class="container mx-auto py-12">

        <!-- 商品列表 -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">訂單詳情</h2>
            <ul style="list-style: none; padding: 0;">
                @foreach($cartItems as $item)
                    <li class="mb-4 flex items-center">
                        <img src="{{ asset('images/' . $item->product->pictures) }}" alt="{{ $item->product->name }}" class="w-32 h-32 object-cover rounded-lg mr-4">
                        <div>
                            <p class="font-bold">{{ $item->product->name }}</p>
                            <p>${{ number_format($item->product->price, 2) }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
            <p class="font-bold text-lg mt-6">
                總金額：$
                {{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}
            </p>

            <form action="{{ route('checkout') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg" style="margin-right: 10px; padding: 10px 20px; background-color: #73AE22; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    購買
                </button>
            </form>
        </div>


    </div>
@endsection
