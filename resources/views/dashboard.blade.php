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
                    {{ __("目前沒有任何遊戲!") }}
                </div>
            </div>
        </div>
    </div>





    <div class="flex justify-center mt-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg" style="padding: 10px 20px; background-color: #316282; color: white; border: none; border-radius: 5px; cursor: pointer;">
                {{ __('登出') }}
            </x-primary-button>
        </form>
    </div>

@endsection
