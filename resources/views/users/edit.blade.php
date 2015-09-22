@extends('app')

@section('content')
	<article>
		<h1 class="text-center">Edit user</h1>
		@include ('errors.form', ['errors' => $errors])

		{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->id]]) !!}
			@include ( 'users.partials.form', ['submitButtonText' => 'Edit user'] )
		{!! Form::close() !!}
	</article>
@stop