@extends('app')

@section('content')
	<article>
		<h1 class="text-center">Add a new attribute</h1>
		@include ('errors.form', ['errors' => $errors])

		{!! Form::open(['action' => 'AttributesController@store']) !!}
			@include ( 'attributes.partials.form', ['submitButtonText' => 'Add New Attribute'] )
		{!! Form::close() !!}
	</article>
@stop