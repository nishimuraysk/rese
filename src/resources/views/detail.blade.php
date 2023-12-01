@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="shop-detail__content">
        <div class="shop-detail__container">
            <div class="shop-detail__header">
                <a class="shop-detail__back-button" href="/"><</a>
                <p class="shop-detail__title">{{ $shop['name'] }}</p>
            </div>
            <div class="shop-detail__image-container">
                <img class="shop-detail__image" src="{{ $shop['image'] }}" />
            </div>
            <div class="shop-detail__tag-container">
                <div class="shop-detail__tag">#{{ $shop['area']['name'] }}</div>
                <div class="shop-detail__tag">#{{ $shop['category']['name'] }}</div>
            </div>
            <div class="shop-detail__description-container">
                <p class="shop-detail__description">
                    {{ $shop['summary'] }}
                </p>
            </div>
        </div>
        <div class="reservation-container">
            <div class="reservation__title">予約</div>
            <form action="/reserve?id={{ $shop['id'] }}" method="POST">
                @csrf
                <div class="reservation__date-container">
                    <input class="reservation__date" type="date" name="date" id="reservation__date" onchange="select_date()" required min="{{ $tomorrow }}"></input>
                </div>
                <div class="reservation__time-container">
                    <select class="reservation__time" name="time" id="reservation__time" onchange="select_time()" required>
                        <option value="" selected disabled>時間を選択してください</option>
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
                        <option value="" selected disabled>人数を選択してください</option>
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
                    <tr><th class="reservation-column">Shop</th><td class="reservation-item">{{ $shop['name'] }}</td></tr>
                    <tr><th class="reservation-column">Date</th><td class="reservation-item" id="reservation-item__date"></td></tr>
                    <tr><th class="reservation-column">Time</th><td class="reservation-item" id="reservation-item__time"></td></tr>
                    <tr><th class="reservation-column">Number</th><td class="reservation-item" class="reservation-item" id="reservation-item__number"></td></tr>
                </table>
                <div class="reservation-button__container">
                    <button class="reservation-button">予約する</button>
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