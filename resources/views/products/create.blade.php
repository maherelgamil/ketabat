@extends('app')

@section('content')
	<article>
		<h1 class="text-center">Add a new product</h1>
		@include ('errors.form', ['errors' => $errors])

		{!! Form::open(['action' => 'ProductsController@store', 'method' => 'post']) !!}
			@include ( 'products.partials.form', ['submitButtonText' => 'Add New Product'] )
		{!! Form::close() !!}
	</article>
@stop