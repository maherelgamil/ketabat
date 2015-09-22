@extends('app')

@section('content')
	<article>
		<div class="row">
			<div class="col-md-6">
				<a href="{{ url('admin/settings/backup') }}">
					<button type="button" class="btn btn-warning btn-block"><i class="fa fa-cubes"></i> Backup</button>
				</a>
			</div>

			<div class="col-md-6">
				<a href="{{ url('admin/settings/restore') }}">
					<button type="button" class="btn btn-warning btn-block"><i class="fa fa-cubes"></i> Restore</button>
				</a>
			</div>
		</div>
	</article>
@stop