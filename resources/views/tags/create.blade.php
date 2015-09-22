@extends('app')

@section('content')
	<article>
		<h1 class="text-center">Add a new tag</h1>
		@include ('errors.form', ['errors' => $errors])

		{!! Form::open(['action' => 'TagsController@store']) !!}
			@include ( 'tags.partials.form', ['submitButtonText' => 'Add New Tag'] )
		{!! Form::close() !!}
	</article>
@stop