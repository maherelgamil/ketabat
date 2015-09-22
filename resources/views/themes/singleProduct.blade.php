@extends('app')

@section('content')
	<article>
		<h1>{{ $product->name }}</h1>
		<p>{!! $product->desc !!}</p>
	</article>
@stop