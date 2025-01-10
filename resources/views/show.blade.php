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
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>



    @auth
    <form action="{{ route('comment.store', $products->id) }}" method="POST">
        @csrf
        <div id="comment-form-container" style="width: 50%; margin: auto; margin-bottom: 20px;">
            <table style="width: 100%; border-collapse: collapse; background-color: #16202D;">
                <!-- 最上面的表格行 -->
                <tr>
                    <td colspan="2" style="padding-left: 30px; width: 100%; text-align: left;">
                        <h3>新增評論</h3>
                    </td>
                </tr>
                <tr>
                    <!-- 左上 -->
                    <td style="padding-left: 30px; vertical-align: top; width: 10%;">
                        <div class="form-group">
                            <label for="author">用戶</label>
                        </div>
                    </td>
                    <!-- 右上 -->
                    <td style="padding-right: 50px; vertical-align: top; width: 90%;">
                        <div class="form-group">
                            <label for="content">評論內容</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <!-- 左下 -->
                    <td style="padding-left: 30px; vertical-align: top;">
                        <div class="form-group">
                            <textarea name="author" id="author" class="form-control" rows="1" readonly style="width: 100px; resize: none;">{{ Auth::user()->name }}</textarea>
                        </div>
                    </td>
                    <!-- 右下 -->
                    <td style="padding-right: 50px; vertical-align: top;">
                        <div class="form-group">
                            <textarea name="content" id="content" class="form-control" rows="4" style="width: 100%; height: 150px;" required></textarea>
                        </div>
                    </td>
                </tr>
                <!-- 最下面的表格行 -->
                <tr style="padding-bottom: 30px; text-align: right;">
                    <td colspan="2" style="text-align: right; padding-right: 50px; padding-bottom: 20px;">
                        <button type="submit" class="btn btn-primary">提交評論</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    @endauth
    <table style="width: 50%; border-collapse: collapse; margin: auto; margin-top: 20px; background-color: #16202D;">
        <thead>
        <tr>
            <th colspan="2" style="padding: 8px; border: 1px solid #ddd; text-align: center;">
                <h3 style="padding-left: 30px; width: 100%; text-align: left;">評論</h3>
            </th>
        </tr>
        <tr>
            <th style="padding-left: 30px; vertical-align: top; width: 10%;">作者</th>
            <th style="padding-right: 50px; vertical-align: top; width: 90%;">評論內容</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $comment->author }}</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $comment->content }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection

