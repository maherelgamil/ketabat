@extends('app')

@section('content')
	<article>
		<h3 class="text-center">Reset Password</h3>

		<br />

		@include ('errors.form', ['errors' => $errors])

		{!! Form::open(['url' => '/password/reset', 'method' => 'POST']) !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="token" value="{{ $token }}">

			<div class="form-group">
				{!! Form::label('email', 'E-Mail Address: ') !!}
				{!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password', 'Password: ') !!}
				{!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password_confirmation', 'password Confirmation: ') !!}
				{!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
			</div>


			<div class="form-group">
				<button type="submit" class="btn btn-default">
					Reset Password
				</button>
			</div>
		{!! Form::close() !!}
	</article>
@endsection
