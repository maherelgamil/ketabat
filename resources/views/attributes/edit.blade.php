@extends('app')

@section('content')
	<article>
		<h1 class="text-center">Edit "{{ $attribute->name }}"</h1>
		@include ('errors.form', ['errors' => $errors])

		{!! Form::model($attribute, ['method' => 'PATCH', 'action' => ['AttributesController@update', $attribute->id]]) !!}
			@include ( 'attributes.partials.form', ['submitButtonText' => 'Edit attribute'] )
		{!! Form::close() !!}
	</article>
@stop