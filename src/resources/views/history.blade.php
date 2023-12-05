@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/history.css') }}">
@endsection

@section('content')
    <div class="user-name">
        {{ $user['name'] }}さん
    </div>
    <div class="old-reservation__header__container">
        <div class="old-reservation__header">
            <a class="old-reservation__back-button" href="/mypage">＜</a>
            <p class="old-reservation__title">過去の予約内容</p>
        </div>
    </div>
    <div class="old-reservation__container">
        <div class="reservation-status">
            <?php
                $i=1;
                foreach ($reservations as $reservation) :
            ?>
                <div class="reservation__content">
                    <div class="reservation__header">
                        <div class="reservation__clock-image">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                        </div>
                        <div class="reservation-title">予約<?=$i?></div>
                    </div>
                    <table class="reservation-table">
                        <tr><th class="reservation-column">Shop</th><td class="reservation-item">{{ $reservation['shop']['name'] }}</td></tr>
                        <tr><th class="reservation-column">Date</th><td class="reservation-item">{{ $reservation['date'] }}</td></tr>
                        <tr><th class="reservation-column">Time</th><td class="reservation-item">{{ substr($reservation['time'], 0, 5) }}</td></tr>
                        <tr><th class="reservation-column">Number</th><td class="reservation-item">{{ $reservation['number'] }}人</td></tr>
                    </table>
                    <div class="old-reservation__link__container">
                        <a class="old-reservation__link" href="/mypage/review/{{ $reservation['id'] }}">レビューを投稿する ＞</a>
                    </div>
                </div>
            <?php
                $i++;
                endforeach;
            ?>
            @if (count($reservations) === 0)
                <div class="no-hit__message">
                    <p class="no-hit__message-text">過去の予約はございません。</p>
                </div>
            @endif
        </div>
    </div>
@endsection