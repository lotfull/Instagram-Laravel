<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .top {
            position: absolute;
            top: 18px;
        }

        .right {
            right: 10px;
        }

        .left {
            left: 10px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

@if (Route::has('login'))
    <div class="top right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif

<div class="links top left">
    <a href="/">Posts</a>
    @guest<a href="/users">Users ({{ App\User::count() }})</a>@endguest
    @auth()
        <a href="/users/{{ auth()->id() }}">Profile</a>
        <a href="/posts/create">New Post</a>
        <a href="/users">Users ({{ App\User::count() }})
        <a href="/users/{{ auth()->id() }}/followers">Followers ({{ auth()->user()->followers()->count() }})</a>
        <a href="/users/{{ auth()->id() }}/following">Following ({{ auth()->user()->following()->count() }})</a>
    @endauth
</div>

<div style="margin: 10%">
    @yield('content', 'Default Content')
</div>
</body>
</html>