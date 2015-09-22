@extends('app')

@section('content')
	<article>
		<h1 class="text-center">Edit "{{ $tag->name }}"</h1>
		@include ('errors.form', ['errors' => $errors])

		{!! Form::model($tag, ['method' => 'PATCH', 'action' => ['TagsController@update', $tag->name]]) !!}
			@include ( 'tags.partials.form', ['submitButtonText' => 'Edit Tag'] )
		{!! Form::close() !!}
	</article>
@stop