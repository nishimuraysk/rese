@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks_done.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks-message">
        店舗代表者の登録が完了しました
    </div>
    <div class="back-button__container">
        <a class="back-button" href="/">戻る</a>
    </div>
</div>
@endsection