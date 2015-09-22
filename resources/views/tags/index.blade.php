@extends('app')

@section('content')
	@include ('partials.admin.create')
	<article>
		<table class="table table-striped">
			<tbody>
				@foreach($tags as $tag)
					<tr>
						<td>{{ $tag->name }}</td>
						<td class="text-right">
							{!! Form::open(['action' => ['TagsController@destroy', $tag->name], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
									<button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-fw fa-trash"></i></button>
							{!! Form::close() !!}
							<a href="{!! URL::route('admin.tags.edit', ['id' => $tag->name]) !!}">
								<button type="submit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-fw fa-edit"></i></button>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</article>
@stop

@section ('footer')
	<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	</script>
@endsection