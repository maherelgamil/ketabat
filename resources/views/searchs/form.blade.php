@extends('app')

@section('content')
	<article>

		{!! Form::open(['action' => 'SearchsController@results', 'method' => 'get']) !!}

			<div class="row">
				<div class="col-lg-12">
					<div class="input-group">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search</button>
						</span>
						<input type="text" class="form-control" name="for" placeholder="Search for...">
					</div><!-- /input-group -->
				</div><!-- /.col-lg-12 -->
			</div><!-- /.row -->

		{!! Form::close() !!}

	</article>	
@stop

@section ('footer')
	<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	</script>
@endsection