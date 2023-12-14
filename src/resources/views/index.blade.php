@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/shop_card.css') }}">
@endsection

@section('content')
    @if ( !empty( $user ) && $user->role_id == 3 && !empty( $representative ) )
        <div class="admin-link__content">
            <div class="admin-link__container">
                <a class="admin-link" href="/shop/reservation/{{ $representative['shop_id'] }}">管理画面はこちら ＞</a>
            </div>
        </div>
    @elseif ( !empty( $user ) && $user->role_id == 3 && empty( $representative ) )
        <div class="admin-link__content">
            <div class="admin-link__container">
                <a class="admin-link" href="/shop">店舗情報の登録はこちら ＞</a>
            </div>
        </div>
    @elseif ( !empty( $user ) && $user->role_id == 2 )
        <div class="admin-link__content">
            <div class="admin-link__container">
                <a class="admin-link" href="/representative">店舗代表者の登録はこちら ＞</a>
            </div>
        </div>
    @endif
    <div class="search-box">
        <form action="/search" class="shop-select__form" method="get">
            @csrf
            <div>
                <select name="area_id" class="shop-select__area">
                    <option value="">All area</option>
                    @foreach ( $areas as $area )
                        @if ( !empty($selected_area) && $selected_area == $area['id'] )
                            <option value="{{ $area['id'] }}" selected>{{ $area['name'] }}</option>
                        @else
                            <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                        @endif
                    @endforeach
                </select>
                <select name="category_id" class="shop-select__category">
                    <option value="">All genre</option>
                    @foreach ( $categories as $category )
                        @if ( !empty($selected_category ) && $selected_category == $category['id'] )
                            <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
                        @else
                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endif
                    @endforeach
                </select>
                @if ( !empty($input_keyword) )
                    <input type="text" name="keyword" value="{{ $input_keyword }}" placeholder="Search …" class="shop-select__text" >
                @else
                    <input type="text" name="keyword" placeholder="Search …" class="shop-select__text" >
                @endif
                <button class="shop-select__button"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>
            </div>
        </form>
    </div>
    <div class="shop-card__content">
        @foreach ( $shops as $shop )
        <div class="shop-card__container">
            <div class="shop-card">
                <div class="shop-card__image-content">
                    <img class="shop-card__image" src="{{ $shop['image'] }}" />
                </div>
                <div class="shop-card__container">
                    <div class="shop-card__title">{{ $shop['name'] }}</div>
                    <div class="shop-card__tag-content">
                        <div class="shop-card__tag">#{{ $shop['area']['name'] }}</div>
                        <div class="shop-card__tag">#{{ $shop['category']['name'] }}</div>
                    </div>
                    <div class="shop-card__footer">
                        <div class="shop-card__detail-button-content">
                            <a class="shop-card__detail-button" href="/detail/{{ $shop['id'] }}">詳しく見る</a>
                        </div>
                        @if ( empty($user) )
                            <div class="shop-card__favorite-button">
                            </div>
                        @elseif ( $shop['favorite'] == 1 )
                            <div class="shop-card__favorite-button-container">
                                <form action="/favorite/delete?id={{ $shop['id'] }}" method="POST">
                                    @csrf
                                    <button class="shop-card__favorite-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="shop-card__favorite-button-container">
                                <form action="/favorite?id={{ $shop['id'] }}" method="POST">
                                    @csrf
                                    <button class="shop-card__non-favorite-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if (count($shops) === 0)
        <div class="no-hit__message">
            <p class="no-hit__message-text">該当の店舗情報はございません。</p>
        </div>
    @endif
@endsection