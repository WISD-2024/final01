@extends('layouts.app')

@section('title', '歡迎來到 Dream 遊戲商店')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <h2 class="text-xl font-semibold mb-4">遊戲列表</h2>
                        @if($products->isEmpty())
                            <p>目前沒有任何遊戲！</p>
                        @else
                            <div class="container">

                                @foreach($products as $product)
                                    <a href="{{ route('show', $product->id) }}">
                                        <div class="product-item">
                                            <img src="{{ asset('images/' . $product->pictures) }}" alt="{{ $product->name }}">
                                            <h3>{{ $product->name }}</h3>
                                            <p>{{ $product->price }}</p>
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
