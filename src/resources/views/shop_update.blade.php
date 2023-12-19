@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')
<div class="action_message--container">
    @if(session('message'))
    <div class="action_message">
        {{ session('message') }}
    </div>
    @endif
</div>
<div class="admin__container">
    <div class="admin__content-unselected">
        <a class="admin-unselected" href="/shop/reservation/{{ $shop['id'] }}">予約一覧 ＞</a>
    </div>
    <div class="admin__content-selected">
        <p class="admin-selected">店舗情報の変更</p>
    </div>
</div>
<div class="input__content">
    <form action="/shop/update/{{ $shop['id'] }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="h1">店舗情報の変更</h1>
        <div class="input__container">
            <label for="name" class="input-label">店舗名</label>
            <input type="text" class="input-text" name="name" id="name" value="{{ $shop['name'] }}" required>
        </div>
        <div class="input__container">
            <label for="area" class="input-label">エリア</label>
            <select class="input-area" name="area" id="area" required>
                <option value="{{ $shop['area_id'] }}" selected hidden>{{ $shop['area']['name'] }}</option>
                @foreach ( $areas as $area )
                <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="input__container">
            <label for="category" class="input-label">カテゴリ</label>
            <select class="input-category" name="category" id="category" required>
                <option value="{{ $shop['category_id'] }}" selected hidden>{{ $shop['category']['name'] }}</option>
                @foreach ( $categories as $category )
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="input__container">
            <label for="summary" class="input-label">店舗紹介文</label>
            <textarea name="summary" id="summary" class="input-summary" value="{{ $shop['summary'] }}" maxlength="255" required>{{ $shop['summary'] }}</textarea>
        </div>
        <div class="input__container">
            <label for="image" class="input-label">店舗画像</label>
            <input type="file" class="input-image" name="image" id="image">
        </div>
        <div class="cautionary-note">※店舗画像を変更しない場合はファイルを選択せずに進んでください</div>
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
            <button class="input-button">店舗情報を変更する ＞</button>
        </div>
    </form>
</div>
@endsection