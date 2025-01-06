@extends('layouts.app')

@section('title', '歡迎來到 Dream 遊戲商店')

@section('content')

    <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 每行兩個商品 */
            gap: 20px; /* 商品之間的間隔 */
        }

        .product-item {
            padding-bottom: 8px;
            background: radial-gradient(circle, #384351, #283645);
            border-radius: 8px;
        }

        .product-item img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
    </style>

    <div style="width: 50%; margin: 0 auto;">
        <h2 style="padding-left: 40px;">遊戲列表</h2>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        @if($products->isEmpty())
                            <p>目前沒有任何遊戲！</p>
                        @else
                            <div class="product-grid">
                                @foreach($products as $product)
                                    <a href="{{ route('show', $product->id) }}">
                                        <div class="product-item">
                                            <img src="{{ asset('images/' . $product->pictures) }}" alt="{{ $product->name }}">
                                            <h3 style="padding-left: 16px; color: white">{{ $product->name }}</h3>
                                            <p style="padding-left: 16px; color: white">NT$ {{ $product->price }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
