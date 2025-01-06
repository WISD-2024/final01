@extends('layouts.app')

@section('title', '收藏庫')

@section('content')


    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Welcome, ') }}{{ Auth::user()->name }}{{ __('  這是您的收藏庫') }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        @if($products->isEmpty())
                            <p>目前沒有任何遊戲！</p>
                        @else
                            <div class="container">
                                @foreach($products as $product)
                                    <div class="product-item">
                                         <img src="{{ asset('images/' . $product->pictures) }}" alt="{{ $product->name }}">
                                         <h3>{{ $product->name }}</h3>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
