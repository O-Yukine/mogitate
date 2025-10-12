@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="register-contents">
        <form action="/products/{{ $product->id }}/update" enctype="multipart/form-data" method="post">
            @method('Patch')
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    {{-- <img src="{{ asset('storage/images/' . $product->image) }}" alt="画像" /> --}}
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="file" name="image" value="{{ $product->image }}">
                    </div>
                    <div class="form__erro"><!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="form__erro"><!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">値段</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form__erro"><!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">季節</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--select">
                        @foreach ($seasons as $season)
                            <input type="checkbox" name="season[]" value="{{ $season->id }}"
                                {{ $product->seasons->contains($season->id) ? 'checked' : '' }}>
                            <label for="season{{ $season->id }}">{{ $season->name }}</label>
                        @endforeach
                    </div>
                    <div class="form__erro"><!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品説明</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="description">{{ $product->description }}</textarea>
                    </div>
                    <div class="form__erro"><!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
            </div>
            <div class="form__button">
                <a href="/products">戻る</a>
                <button class="form__button-submit" type="submit">変更を保存</button>
            </div>
        </form>
        <form class="form" action="/products/{{ $product->id }}/delete" method="post">
            @method('delete')
            @csrf
            <button class="form__button-submit" type="submit">削除</button>
        </form>
    </div>
@endsection
