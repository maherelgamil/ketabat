@extends('app')

@section('content')
	<article>
		<h1 class="text-center">Edit "{{ $product->name }}"</h1>
		@include ('errors.form', ['errors' => $errors])

		{!! Form::model($product, ['method' => 'PATCH', 'action' => ['ProductsController@update', $product->id]]) !!}
			@include ( 'products.partials.form', ['submitButtonText' => 'Edit product'] )
		{!! Form::close() !!}
	</article>
@stop