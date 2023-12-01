@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks_done.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks-message">
        会員登録ありがとうございます
    </div>
    <div class="back-button__container">
        <?php
            $user = auth()->user();
        ?>
        @if ( empty($user) )
            <a class="back-button" href="/login">ログインする</a>
        @else
            <a class="back-button" href="/">お店を探す</a>
        @endif
    </div>
</div>
@endsection