<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <base href="{{url('/')}}">
    <title>Laravel</title>
</head>
<body>
<header>
    <div class="header_content container">
        <img src="{{asset('public/img/logo/logo.svg')}}" alt="logo" class="logo">
        <div class="links">
            <a href="/zapis">Заявки</a>
            @if(auth()->user() && auth()->user()->role_id == 1)
                <a href="/zapis/create">Заказать</a>
            @endif
        </div>
        <div class="buttons">
            @auth
                <form action="/logout" method="post">
                    @csrf
                    <button>Выйти</button>
                </form>
            @else
                <a href="/register" class="button">Созать аккаунт</a>
                <a href="/login" class="button">Войти</a>
            @endauth
        </div>
    </div>
</header>
