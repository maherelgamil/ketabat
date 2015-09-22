@extends('app')

@section('content')
	<article>
		<div class="row">
			<div class="col-md-6">
				<a href="{!! URL::route('admin.users.edit', ['id' => $user->id]) !!}">
					<button type="submit" class="btn btn-primary btn-sm btn-block" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-fw fa-edit"></i></button>
				</a>
			</div>
			<div class="col-md-6">
				{!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'DELETE']) !!}
					<button type="submit" class="btn btn-danger btn-block btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-fw fa-trash"></i></button>
				{!! Form::close() !!}
			</div>
		</div>
		<br />
		<p>{{ $user->email }}</p>
		<p>{{ $user->role}}</p>
	</article>
@stop

@section ('footer')
	<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	</script>
@endsection