<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <?php
            $user = auth()->user();
        ?>
        @if ( empty($user) )
            <div class="nav">
                <input id="drawer_input" class="drawer_hidden" type="checkbox">
                <label for="drawer_input" class="drawer_open"><span></span></label>
                <nav class="nav_content">
                    <ul class="nav_list">
                        <li class="nav_item"><a href="/">Home
                    </a></li>
                        <li class="nav_item"><a href="/register">Registration</a></li>
                        <li class="nav_item"><a href="/login">Login</a></li>
                    </ul>
                </nav>
            </div>
        @else
            <div class="nav">
                <input id="drawer_input" class="drawer_hidden" type="checkbox">
                <label for="drawer_input" class="drawer_open"><span></span></label>
                <nav class="nav_content">
                    <ul class="nav_list">
                        <li class="nav_item"><a href="/">Home
                        </a></li>
                        <li class="nav_item"><a href="/logout">Logout</a></li>
                        <li class="nav_item"><a href="/mypage">Mypage</a></li>
                    </ul>
                </nav>
            </div>
        @endif
        <div class="logo"><a href="/" class="logo__text">Rese</a></div>
    </header>
    <main class="main">
        @yield('content')
    </main>
</body>