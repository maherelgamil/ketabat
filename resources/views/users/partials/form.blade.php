<div class="form-group">
	{!! Form::label('email', 'Email: ') !!}
	{!! Form::input('text', 'email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('password', 'Password: ') !!}
	{!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('retype_password', 'retype-Password: ') !!}
	{!! Form::password('retype_password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('role', 'role: ') !!}
	{!! Form::select('role', $roles, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>