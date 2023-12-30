@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/verify_email.css') }}">
@endsection

@section('content')
<div class="message__container">
    <div class="message">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="message">
        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
    @endif
</div>
<div class="button__container">
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div>
            <x-primary-button class="button">
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </div>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="button">
            {{ __('Log Out') }}
        </button>
    </form>
</div>
@endsection