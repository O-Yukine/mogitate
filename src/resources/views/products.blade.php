@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
    <div class="product-contents">
        <div class="product-contents__title">
            <h2>商品一覧</h2>
            <a class="product-contents__register" href="{{ asset('/products/register') }}">+&nbsp;商品を追加</a>
        </div>
        <div class="product-contents__inner">
            <div class="product-contents__search">
                <form class="form" action="/products/search" method="get">
                    <div class="product-contents__search--list">
                        <input class="product-contents__search--keyword" type="text" placeholder="商品名で検索" name="keyword">
                        <button class="product-contents__search--submit" type="submit">検索</button>
                        <p>価格順で表示</p>
                        <select class="product-contents__sort" name="sort" onchange="this.form.submit()">
                            <option value="">価格で並べ替え</option>
                            <option value="lower_price">価格が安い順 </option>
                            <option value="higher_price"> 価格が高い順</option>
                        </select>
                        @if (request('sort') == 'lower_price')
                            <div class="sort_result">
                                <p>価格が安い順&nbsp;&nbsp;&nbsp;<a href="/products">x</a></p>
                            </div>
                        @elseif(request('sort') == 'higher_price')
                            <div class="sort_result">
                                <p>価格が高い順&nbsp;&nbsp;&nbsp;<a href="/products">x</a></p>

                            </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="product-contents__products">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
        {{ $products->appends(request()->except('page'))->links() }}
    </div>
@endsection
