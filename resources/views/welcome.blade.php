@extends('layouts.app')
@section('content')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

<div class="welcome">
    <h1 style= "padding:15px; margin-top: 50px">Welcome to last sprint <br> "CRUD Application" </h1>
    <h2 style= "padding:15px">This project is for learning purpose</h2>
    <p>Start using application by registering new user</p>
    <ul class="welcome-ul">
    @if (Route::has('login'))
    <li class="welcome-li">
        <a class="welcome-btn" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
@endif

@if (Route::has('register'))
    <li class="welcome-li">
        <a class="welcome-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
</ul>
@endif
</div>
@endsection