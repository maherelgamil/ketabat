@extends('app')

@section('content')
@if (! $results->isEmpty() )
	<article>

		{!! Form::open(['action' => 'SearchsController@results', 'method' => 'get']) !!}

			<div class="row">
				<div class="col-lg-12">
					<div class="input-group">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search</button>
						</span>
						<input type="text" class="form-control" name="for" placeholder="Search for..." value="{{ $query }}">
					</div><!-- /input-group -->
				</div><!-- /.col-lg-12 -->
			</div><!-- /.row -->

		{!! Form::close() !!}

	</article>

	@foreach( $results as $result )
		<article>
			<h1><a href="{{ url('products', $result->id) }}">{{ $result->name }}</a></h1>
			<p>{{ $result->desc }}</p>
		</article>
	@endforeach
@else
	<article>
		<div class="alert alert-warning" role="alert">No search result for: {{ $query }}</div>

		{!! Form::open(['action' => 'SearchsController@results', 'method' => 'get']) !!}

			<div class="row">
				<div class="col-lg-12">
					<div class="input-group">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search</button>
						</span>
						<input type="text" class="form-control" name="for" placeholder="Search for..." value="{{ $query }}">
					</div><!-- /input-group -->
				</div><!-- /.col-lg-12 -->
			</div><!-- /.row -->

		{!! Form::close() !!}

	</article>
@endif

@stop