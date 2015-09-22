@extends('app')

@section('content')
	<article>
		{!! Form::open(['action' => 'pagesController@contact', 'class' => 'cd-form floating-labels']) !!}

			<div class="form-group">
				{!! Form::label('subject', 'Subject: ') !!}
				{!! Form::text('subject', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('email', 'Email: ') !!}
				{!! Form::email('email', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('message', 'Message: ') !!}
				{!! Form::textarea('message', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Send', ['class' => 'btn btn-primary form-control']) !!}
			</div>

		{!! Form::close() !!}
	</article>
@stop