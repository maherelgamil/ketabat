@extends('app')

@section('content')
	<article>
        @include ('articles.partials.editNav')

		<h1>{{ $article->title }}</h1>
		{!! $article->body !!}
		<time>{{ $article->published_at }}</time>
        @unless($article->tags->isEmpty())
            <p>Tags:
            @foreach ($article->tags as $tag)
                <a href="{{ URL::route('admin.tags.show', ['name' => $tag->name]) }}">{{ $tag->name }}</a>
            @endforeach
            </p>
        @endunless
	</article>
@stop