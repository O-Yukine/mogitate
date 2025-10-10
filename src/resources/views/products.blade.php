@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
    <div class="product-contents">
        <div class="product-contents__title">
            <h2>商品一覧</h2>
            <a class="product-contents__register" href="{{ asset('/products/register') }}">+商品を追加</a>
        </div>
        <div class="product-contents__inner">
            <div class="product-contents__search">
                <div class="product-contents__search--list">
                    <ul>
                        <li><input class="product-contents__search--keyword" type="text" placeholder="商品名で検索"></li>
                        <li><button class="product-contents__search--submit" type="submit">検索</button></li>
                        <li>価格順で表示</li>
                        <li><select class="product-contents__sort" name="" id="">
                                <option value="">価格で並べ替え</option>
                            </select></li>
                    </ul>
                </div>
            </div>
            <div class="product-contents__products">
                @foreach ($products as $product)
                @endforeach
                <div class="card">
                    <div class="card__img">
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="画像" />
                    </div>
                    <div class="card__content">
                        <div class="card__content-tag">
                            <p class="card__content-tag-item"> {{ $product->name }} </p>
                            <p class="card__content-tag-item card__content-tag-item--last"> {{ $product->price }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
