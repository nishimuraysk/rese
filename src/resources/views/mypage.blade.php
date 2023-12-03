@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<link rel="stylesheet" href="{{ asset('css/shop_card.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
@endsection

@section('content')
    <div class="user-name">
        {{ $user['name'] }}さん
    </div>
    <div class="mypage__content">
        <div class="reservation-status">
            <p class="content-title">予約状況</p>
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
                        <div class="cancel-button-container">
                            <form action="/reserve/delete?id={{ $reservation['id'] }}" method="POST">
                                @csrf
                                <button class="cancel-button">×</button>
                            </form>
                        </div>
                    </div>
                    <table class="reservation-table">
                        <tr><th class="reservation-column">Shop</th><td class="reservation-item">{{ $reservation['shop']['name'] }}</td></tr>
                        <tr><th class="reservation-column">Date</th><td class="reservation-item">{{ $reservation['date'] }}</td></tr>
                        <tr><th class="reservation-column">Time</th><td class="reservation-item">{{ substr($reservation['time'], 0, 5) }}</td></tr>
                        <tr><th class="reservation-column">Number</th><td class="reservation-item">{{ $reservation['number'] }}人</td></tr>
                    </table>
                    <div class="reservation__update__link__container">
                        <a class="reservation__update__link" href="/mypage/reservation/{{ $reservation['id'] }}">予約内容を変更する ＞</a>
                    </div>
                </div>
            <?php
                $i++;
                endforeach;
            ?>
            @if (count($reservations) === 0)
                <div class="no-hit__message">
                    <p class="no-hit__message-text">予約の店舗情報はございません。</p>
                </div>
            @endif
        </div>
        <div class="favotite-shops">
            <p class="content-title">お気に入り店舗</p>
            @if (count($favorites) === 0)
                <div class="no-hit__message">
                    <p class="no-hit__message-text">お気に入りの店舗情報はございません。</p>
                </div>
            @endif
            <div class="shop-card__content">
            @foreach ( $favorites as $favorite )
                <div class="shop-card__container">
                    <div class="shop-card">
                        <div class="shop-card__image-content">
                            <img class="shop-card__image" src="{{ $favorite['shop']['image'] }}" />
                        </div>
                        <div class="shop-card__container">
                            <div class="shop-card__title">{{ $favorite['shop']['name'] }}</div>
                            <div class="shop-card__tag-content">
                                <div class="shop-card__tag">#{{ $favorite['area'] }}</div>
                                <div class="shop-card__tag">#{{ $favorite['category'] }}</div>
                            </div>
                            <div class="shop-card__footer">
                                <div class="shop-card__detail-button-content">
                                    <a class="shop-card__detail-button" href="/detail/{{ $favorite['shop_id'] }}">詳しく見る</a>
                                </div>
                                <div class="shop-card__favorite-button-container">
                                    <form action="/favorite/delete?id={{ $favorite['shop_id'] }}" method="POST">
                                        @csrf
                                        <button class="shop-card__favorite-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection