@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/select.css') }}">
@endsection

@section('content')
<div class="link__container">
    <a class="link" href="/representative">店舗代表者を登録する ＞</a>
</div>
<div class="link__container">
    <a class="link" href="/mail">メールを送信する ＞</a>
</div>
@endsection