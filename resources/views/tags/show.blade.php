@extends('app')

@section('content')
	<article>
		<h1>{{ $tag->name }}</h1>
	</article>
	@foreach($articles as $article)

		<article>
			<a href="{{ url('articles', $article->id) }}"><h1>{{ $article->title }}</h1></a>
			<p>{!! $article->body !!}</p>
		</article>
	@endforeach
@stop