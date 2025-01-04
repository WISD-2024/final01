@extends('layouts.app')

@section('title', '歡迎來到 Dream 遊戲商店')

@section('content')
    <div class="container mx-auto py-12">
        <div class="flex flex-wrap items-center">
            <!-- 商品圖片 -->
            <div class="w-full md:w-1/2">
                <img src="{{ asset('images/' . $product->pictures) }}" alt="{{ $product->name }}" class="w-full max-w-lg rounded-lg shadow-md">
            </div>

            <!-- 商品資訊 -->
            <div class="w-full md:w-1/2 px-6">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ $product->name }}</h1>
                <p class="text-gray-700 dark:text-gray-300 mb-6">{{ $product->detail }}</p>
                <p class="text-xl text-green-600 font-bold mb-6">價格：${{ number_format($product->price, 2) }}</p>

                <!-- 添加購物車按鈕 -->
                <form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                        加入購物車
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
