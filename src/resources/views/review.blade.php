@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('content')
    <div class="user-name">
        {{ $user['name'] }}さん
    </div>
    <div class="review__container">
        <div class="review__header">
                <a class="review__back-button" href="/mypage/history">＜</a>
                <p class="review__title">{{ $reservation['shop']['name'] }}のレビューを投稿する</p>
        </div>
    </div>
    <div class="review-form">
        <div class="review-form__container">
            <form action="/mypage/review/{{ $reservation['id'] }}" method="POST">
                @csrf
                <div class="review__evaluation-container">
                    <div class="label__container">
                        <label class="label" for="evaluation">評価</label>
                    </div>
                    <select class="reservation__evaluation" name="evaluation" id="evaluation" required>
                        <option value="" selected disabled>評価を選択してください</option>
                        <option value="5">5：非常に満足</option>
                        <option value="4">4：そこそこ満足</option>
                        <option value="3">3：普通</option>
                        <option value="2">2：少し残念だった</option>
                        <option value="1">1：非常に残念だった</option>
                    </select>
                </div>
                <div class="review__comment-container">
                    <div class="label__container">
                        <label class="label" for="comment">コメント<br>（250文字以内）</label>
                    </div>
                    <textarea class="reservation__comment" name="comment" id="comment" placeholder="250文字以内でコメントを入力してください。" maxlength="250" required></textarea>
                </div>
                @if ( $errors->any() )
                <div class="review__alert">
                    <ul>
                        @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="review-button__container">
                    <button class="review-button">レビューを投稿する</button>
                </div>
            </form>
        </div>
    </div>
@endsection