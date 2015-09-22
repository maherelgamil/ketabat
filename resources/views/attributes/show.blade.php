@extends('app')

@section('content')
	<article>
		<h1>{{ $attribute->name }}</h1>
	</article>
	@foreach($products as $product)
		<article>
			<a href="{{ url('products', $product->id) }}"><h1>{{ $product->name }}</h1></a>
			<p>{!! $product->desc !!}</p>
		</article>
	@endforeach
@stop