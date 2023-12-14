@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')
    <div class="input__content">
        <form action="/shop" method="POST">
            @csrf
            <h1 class="h1">店舗情報の登録</h1>
            <div class="input__container">
                <label for="name" class="input-label">店舗名</label>
                <input type="text" class="input-text" name="name" id="name" placeholder="店舗名を入力してください。">
            </div>
            <div class="input__container">
                <label for="area" class="input-label">エリア</label>
                <select class="input-area" name="area" id="area">
                    <option value="" selected disabled>エリアを選択してください</option>
                    @foreach ( $areas as $area )
                        <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input__container">
                <label for="category" class="input-label">カテゴリ</label>
                <select class="input-category" name="category" id="category">
                    <option value="" selected disabled>カテゴリを選択してください</option>
                    @foreach ( $categories as $category )
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input__container">
                <label for="summary" class="input-label">店舗紹介文</label>
                <textarea name="summary" id="summary" class="input-summary" placeholder="店舗の紹介文を入力してください。" maxlength="255"></textarea>
            </div>
            <div class="input__container">
                <label for="image" class="input-label">店舗画像</label>
                <input type="text" class="input-image" name="image" id="image" placeholder="画像のURLを入力してください。">
            </div>
            @if ( $errors->any() )
                <div class="error__container">
                    <ul>
                        @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="input-button__container">
                <button class="input-button">店舗情報を登録する</button>
            </div>
        </form>
    </div>
@endsection