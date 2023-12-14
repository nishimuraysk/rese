@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/representative_reservation.css') }}">
@endsection

@section('content')
    <div class="admin__container">
        <div class="admin__content-selected">
            <p class="admin-selected">予約一覧</p>
        </div>
        <div class="admin__content-unselected">
            <a class="admin-unselected" href="/shop/update/{{ $shop['id'] }}">店舗情報の変更 ＞</a>
        </div>
    </div>
    <div class="reservation__content">
        <h1 class="h1">{{ $shop['name'] }}の予約一覧</h1>
        <div class="table">
            <table class="table__inner">
                <tr class="table__row">
                    <th class="table__header">name</th>
                    <th class="table__header">date</th>
                    <th class="table__header">time</th>
                    <th class="table__header">number</th>
                </tr>
                @foreach ( $reservations as $reservation )
                <tr class="table__row">
                    <td class="table__item">{{ $reservation['user']['name'] }}</td>
                    <td class="table__item">{{ $reservation['date'] }}</td>
                    <td class="table__item">{{ substr($reservation['time'], 0, 5) }}</td>
                    <td class="table__item">{{ $reservation['number'] }}名</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection