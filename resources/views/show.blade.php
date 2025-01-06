@extends('layouts.app')

@section('title', $products->name)

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table style="width: 50%; height: auto; border-collapse: collapse; margin: auto; margin-top: 30px;">
        <tr>
        <td>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ $products->name }}</h1>
        </td>
        </tr>
        <tr>
            <td style="width: 70%; vertical-align: top;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td>
                            @php
                                $video = str_replace(".jpg", "", $products->name);
                            @endphp
                            @if (file_exists(public_path('videos/' . $video . '.mp4')))
                                <video autoplay muted controls width=100% height=100%>
                                    <source src="{{ asset('videos/' . $video . '.mp4') }}" type="video/mp4">
                                    您的瀏覽器不支援影片播放功能。
                                </video>
                            @else
                                <p>影片檔案不存在。</p>
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 30%; vertical-align: top;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td>
                            <!-- 商品圖片 -->
                            <div style="width: 100%; margin: auto;">
                                <img src="{{ asset('images/' . $products->pictures) }}" alt="{{ $products->name }}" style="width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                            </div>

                            <!-- 商品資訊 -->
                            <p class="text-gray-700 dark:text-gray-300 mb-6">{{ $products->detail }}</p>
                            <p class="text-xl text-green-600 font-bold mb-6">價格：${{ number_format($products->price, 2) }}</p>
                            <!-- 添加購物車按鈕 -->
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                <button type="submit" style="background-color: #73AE22; color: white; border: none;">
                                    加入購物車
                                </button>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection
