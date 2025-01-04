@extends('layouts.app')

@section('title', '歡迎來到 Dream 遊戲商店')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('您的購物車') }}
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

@endsection
