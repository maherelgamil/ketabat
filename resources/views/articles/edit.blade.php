@extends('app')

@section('content')
	<article>
		<h1 class="text-center">Update Article</h1>

		@include('errors.form', ['errors' => $errors])

		{!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
			@include ( 'articles.partials.form', ['submitButtonText' => 'Update Article'] )
		{!! Form::close() !!}
	</article>
@stop