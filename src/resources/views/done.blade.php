@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks_done.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks-message">
        ご予約ありがとうございます
    </div>
    <div class="back-button__container">
        <a class="back-button" href="/mypage">戻る</a>
    </div>
</div>
@endsection