@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register-contents">
        <div class="register-contents__titel">
            <h2>商品登録</h2>
        </div>
        <div class="form-inner">
            <form action="/products/register" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">商品名</span>
                        <span class="form__label--required">必須</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="name" placeholder="商品名を入力">
                        </div>
                        <div class="form__error">
                            @error('name')
                                {{ $message }}
                            @enderror </div>
                        <div class="form__group">
                            <div class="form__group-title">
                                <span class="form__label--item">値段</span>
                                <span class="form__label--required">必須</span>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <input type="text" name="price" placeholder="値段を入力">
                                </div>
                                <div class="form__error">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form__group">
                            <div class="form__group-title">
                                <span class="form__label--item">商品画像</span>
                                <span class="form__label--required">必須</span>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <img src="" alt="画像" id="preview">
                                    <input type="file" name="image" id="imageInput">
                                </div>
                                <div class="form__error">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form__group">
                            <div class="form__group-title">
                                <span class="form__label--item">季節</span>
                                <span class="form__label--required">必須</span>
                                <span class="form__label--select">複数選可</span>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--select">
                                    @foreach ($seasons as $season)
                                        <input type="checkbox" name="season[]" value="{{ $season->id }}">
                                        <label for="season{{ $season->id }}">{{ $season->name }}</label>
                                    @endforeach
                                </div>
                                <div class="form__error">
                                    @error('season')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form__group">
                            <div class="form__group-title">
                                <span class="form__label--item">商品説明</span>
                                <span class="form__label--required">必須</span>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--textarea">
                                    <textarea name="description"></textarea>
                                </div>
                                <div class="form__error">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form__button">
                            <a href="/products" class="form__button-back">戻る</a>
                            <button class="form__button-submit" type="submit">登録</button>
                        </div>
            </form>
        </div>
    </div>


    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('preview');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // 表示する
                };

                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none'; // 非表示にする
            }
        });
    </script>
@endsection
