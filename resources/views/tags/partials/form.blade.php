<div class="form-group">
	{!! Form::label('name', 'Name: ') !!}
	{!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>