@extends('layouts.app')

@section('title', '購物車')

@section('content')
    <div class="container mx-auto py-12">
    @if($cartItems->isEmpty())
        <p>購物車目前是空的。</p>
    @else
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
            <div class="container mx-auto py-12">
                <h1 class="text-2xl font-bold mb-6">購物車</h1>
                <ul>
                    @foreach($cartItems as $item)
                        <li class="mb-4 flex items-center">
                            <img src="{{ asset('images/' . $item->product->pictures) }}" alt="{{ $item->product->name }}" class="w-32 h-32 object-cover rounded-lg mr-4">
                            <div>
                                <span class="block">{{ $item->product->name }}</span>
                                <span class="block">${{ number_format($item->product->price, 2) }}</span>
                                <span class="block">數量：{{ $item->quantity }}</span>

                            </div>
                    </li>
                    @endforeach

                </ul>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg mt-6">
                    前往結算
                </button>
            </div>
        </form>
    </div>
    @endif
@endsection
