@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reservation_update.css') }}">
@endsection

@section('content')
    <div class="action_message--container">
        @if(session('message'))
            <div class="action_message">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="user-name">
        {{ $user['name'] }}さん
    </div>
    <div class="reservation__update__container">
        <div class="reservation__update__header">
                <a class="reservation__update__back-button" href="/mypage">＜</a>
                <p class="reservation__update__title">ご予約中の店舗　{{ $reservation['shop']['name'] }}</p>
        </div>
    </div>
    <div class="reservation__update-form">
        <div class="reservation-container">
            <div class="reservation__title">予約内容の変更</div>
            <form action="/mypage/reservation/{{ $reservation['id'] }}" method="POST">
                @csrf
                <div class="reservation__date-container">
                    <input class="reservation__date" type="date" value="{{ $reservation['date'] }}" name="date" id="reservation__date" onchange="select_date()" required min="{{ $tomorrow }}"></input>
                </div>
                <div class="reservation__time-container">
                    <select class="reservation__time" name="time" id="reservation__time" onchange="select_time()" required>
                        <option value="{{ substr($reservation['time'], 0, 5) }}" selected hidden>{{ substr($reservation['time'], 0, 5) }}</option>
                        <option value="17:00">17:00</option>
                        <option value="17:30">17:30</option>
                        <option value="18:00">18:00</option>
                        <option value="18:30">18:30</option>
                        <option value="19:00">19:00</option>
                        <option value="19:30">19:30</option>
                        <option value="20:00">20:00</option>
                    </select>
                </div>
                <div class="reservation__number-container">
                    <select class="reservation__number" name="number" id="reservation__number" onchange="select_number()" required>
                        <option value="{{ $reservation['number'] }}" selected hidden>{{ $reservation['number'] }}人</option>
                        <option value="1">1人</option>
                        <option value="2">2人</option>
                        <option value="3">3人</option>
                        <option value="4">4人</option>
                        <option value="5">5人</option>
                        <option value="6">6人</option>
                        <option value="7">7人</option>
                        <option value="8">8人</option>
                        <option value="9">9人</option>
                        <option value="10">10人</option>
                        <option value="11">11人</option>
                        <option value="12">12人</option>
                        <option value="13">13人</option>
                        <option value="14">14人</option>
                        <option value="15">15人</option>
                        <option value="16">16人</option>
                        <option value="17">17人</option>
                        <option value="18">18人</option>
                        <option value="19">19人</option>
                        <option value="20">20人</option>
                    </select>
                </div>
                <table class="reservation-table">
                    <tr><th class="reservation-column">Shop</th><td class="reservation-item">{{ $reservation['shop']['name'] }}</td></tr>
                    <tr><th class="reservation-column">Date</th><td class="reservation-item" id="reservation-item__date">{{ $reservation['date'] }}</td></tr>
                    <tr><th class="reservation-column">Time</th><td class="reservation-item" id="reservation-item__time">{{ substr($reservation['time'], 0, 5) }}</td></tr>
                    <tr><th class="reservation-column">Number</th><td class="reservation-item" class="reservation-item" id="reservation-item__number">{{ $reservation['number'] }}人</td></tr>
                </table>
                @if ( $errors->any() )
                <div class="reservation__alert">
                    <ul>
                        @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="reservation-button__container">
                    <button class="reservation-button">予約内容を変更する</button>
                </div>
            </form>
        </div>
    </div>
    <script language="javascript" type="text/javascript">

        function select_date() {
            var reservation__date = document.getElementById("reservation__date").value;
            document.getElementById("reservation-item__date").innerHTML = reservation__date;
        }

        function select_time() {
            var reservation__time = document.getElementById("reservation__time").value;
            document.getElementById("reservation-item__time").innerHTML = reservation__time;
        }

        function select_number() {
            var reservation__number = document.getElementById("reservation__number").value;
            var message = reservation__number + "人";
            document.getElementById("reservation-item__number").innerHTML = message;
        }

    </script>
@endsection