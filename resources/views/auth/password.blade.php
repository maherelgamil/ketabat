@extends('app')

@section('content')
<article>
	<h3 class="text-center">Reset Password</h3>

	<br />

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

	@include ('errors.form', ['errors' => $errors])

	{!! Form::open(['url' => '/password/email', 'method' => 'POST']) !!}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			{!! Form::label('email', 'E-Mail Address: ') !!}
			{!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-default">
				Send Password Reset Link
			</button>
		</div>
	{!! Form::close() !!}
</article>
@endsection
