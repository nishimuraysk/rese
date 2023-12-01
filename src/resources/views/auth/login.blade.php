@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login_register.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
@endsection

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form__block">
            <div class="main-theme__block">
                <p class="main-theme">Login</p>
            </div>
            <div class="input-form__block">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                <x-text-input id="email" class="input-form" type="email" placeholder="Email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <div class="input-form__error">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="input-form__block">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                <x-text-input id="password" placeholder="Password" class="input-form" type="password" name="password" required autocomplete="current-password" />
            </div>
            <div class="input-form__error">
                <x-input-error :messages="$errors->get('password')" class="error-message" />
            </div>
            <div class="login-button__block">
                <x-primary-button class="login-button">
                    {{ __('ログイン') }}
                </x-primary-button>
            </div>
        </div>
    </form>
@endsection