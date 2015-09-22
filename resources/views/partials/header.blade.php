<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>

	<link rel="stylesheet" href="{{ elixir('css/all.css') }}">

	<script src="{{ elixir('js/all.js') }}"></script>
</head>
<body>
<header>
	<div class="flash-message">
		@include ('flash::message')
	</div>
	<nav>
		<a href="{{ url('search') }}" class="bootstrap"><i class="fa fa-search"></i> Search</a>
		<a href="{{ (Auth::check())?url('auth/logout'):url('auth/login') }}" class="wordpress">@if(Auth::check())<i class="fa fa-sign-in"></i> logout @else <i class="fa fa-sign-in"></i> login @endif </a>
		<a href="{{ url('cart/content') }}" class="laravel cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">{{ Cart::count() }}</span></a>
	</nav>
	<a href="{!! URL::route('home') !!}"><div class="logo"></div></a>
</header>