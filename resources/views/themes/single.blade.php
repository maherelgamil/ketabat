@extends('app')

@section('content')
	<article>
		<h1>{{ $article->title }}</h1>
		{!! $article->body !!}
		<time>{{ $article->published_at }}</time>
        @unless($article->tags->isEmpty())
            <p>Tags:
            @foreach ($article->tags as $tag)
                <a href="{{ route('tags', ['slug' => $tag->slug]) }}">{{ $tag->name }}</a>
            @endforeach
            </p>
        @endunless
	</article>
@stop