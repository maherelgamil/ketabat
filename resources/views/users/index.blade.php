@extends('app')

@section('content')
	@include ('partials.admin.create')
		<article>
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="text-center">Email</th>
						<th class="text-center">Role</th>
						<th class="text-center"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr class="text-center">
						<td>{{ $user->email }}</td>
						<td>{{ $user->role }}</td>
						<td>
							{!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'DELETE', 'class' => 'form-inline pull-right']) !!}
								<button {{ (!$user->remove) ? "disabled" : "" }} type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-fw fa-trash"></i></button>
							{!! Form::close() !!}
							<a href="{!! URL::route('admin.users.edit', ['id' => $user->id]) !!}">
								<button type="submit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-fw fa-edit"></i></button>
							</a>
						</td>
					@endforeach
					</tr>
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