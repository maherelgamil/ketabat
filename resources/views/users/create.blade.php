@extends('app')

@section('content')
	<article>
		<h1 class="text-center">Add a new user</h1>
		@include ('errors.form', ['errors' => $errors])

		{!! Form::open(['action' => 'UsersController@store']) !!}
			@include ( 'users.partials.form', ['submitButtonText' => 'Add New user'] )
		{!! Form::close() !!}
	</article>
@stop