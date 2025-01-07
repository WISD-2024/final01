@extends('layouts.app')

@section('title', '購物車')

@section('content')
    <div class="container mx-auto py-12">
    @if($cartItems->isEmpty())
        <p>購物車目前是空的。</p>
    @else
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold mb-6">購物車</h1>
                <ul style="list-style: none; padding: 0;">
                    @foreach($cartItems as $item)
                        <li class="mb-4 flex items-center">
                            <img src="{{ asset('images/' . $item->product->pictures) }}" alt="{{ $item->product->name }}" class="w-32 h-32 object-cover rounded-lg mr-4">
                            <div>
                                <span class="block">{{ $item->product->name }}</span>
                                <span class="block">${{ number_format($item->product->price, 2) }}</span>
                            </div>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg"  style=" padding: 10px 20px; background-color: #316282; color: white; border: none; border-radius: 5px; cursor: pointer;" >
                                    移除
                                </button>
                            </form>
                        </li>
                    @endforeach

                </ul>
                <div style="display: flex; justify-content: space-around; align-items: center;">
                    <a href="{{ route('preview') }}" class="text-gray-800 dark:text-gray-200" style="margin-right: 10px; padding: 10px 20px; background: linear-gradient(to right, #3A9BED, #2F7DDE, #235ECF); color: white; border: none; border-radius: 5px; cursor: pointer;">前往結帳</a>
                </div>
            </div>

    </div>
    @endif
@endsection
