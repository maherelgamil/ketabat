@extends('app')

@section('content')
	<article>
		<h1 class="text-center">Write a new article</h1>
		@include ('errors.form', ['errors' => $errors])

		{!! Form::open(['action' => 'ArticlesController@store', 'method' => 'post']) !!}
			@include ( 'articles.partials.form', ['submitButtonText' => 'Add New Article'] )
		{!! Form::close() !!}
	</article>
@stop