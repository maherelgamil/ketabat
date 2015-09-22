@extends('app')

@section('content')
	@include ('partials.admin.create')
	@foreach($articles as $article)
		<article>
			<div class="row">
				<div class="col-xs-9"><h1><a href="{{ url('admin/articles', $article->id) }}">{{ $article->title }}</a></h1></div>
				<div class="col-xs-3">
					<!-- Split button -->
					<div class="btn-group">
						<button type="button" class="btn btn-default"><a href="{!! URL::route('admin.articles.edit', ['id' => $article->id]) !!}"><i class="fa fa-fw fa-edit"></i> Edit</a></button>
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li>
								{!! Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'DELETE', 'class' => 'pull-left']) !!}
									<button type="submit" class="btn btn-link"><i class="fa fa-fw fa-trash"></i> Delete</button>
								{!! Form::close() !!}
							</li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</div>					
				</div>
			</div>
			
			<p>{!! $article->body !!}</p>
		</article>
	@endforeach

	@include ('partials.pagination', ['paginate' => $articles])
@stop

@section ('footer')
	<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	</script>
@endsection