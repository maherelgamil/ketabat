@extends('app')

@section('content')
<article class="login">
	<h1 class="text-center"><i class="fa fa-user"></i> Login to your account</h1>
	@include ('errors.form', ['errors' => $errors])

	{!! Form::open(['url' => '/auth/login', 'method' => 'POST', 'data-ajax' => url('ajax/login')]) !!}
		<div class="form-group">
			{!! Form::label('email', 'E-mail Address: ') !!}
			{!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password: ') !!}
			{!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			<div class="checkbox checkbox-primary">
				{!! Form::checkbox('remember', null, 1, ['id' => 'remember']) !!} 
				<label for="remember">Remember Me</label>
			</div>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-default" id="login-btn">Login</button>
			<button type="button" class="btn btn-link pull-right"><a href="{{ url('/password/email') }}">Forgot Your Password?</a></button>
		</div>
	{!! Form::close() !!}
</article>
@endsection

@section ('footer')
	<script type="text/javascript">
		jQuery(document).ready(function () {
			$('#email').change(function(){
					var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,10})+$/;

					if (regex.test($(this).val())) 
						changeInput('#email', 'success', '');
					else 
						changeInput('#email', 'error', 'Your email address is invalid');
			});

			var $loginForm = $('.login form');
			var $loginBtn = $('#login-btn');

			$loginForm.on('submit', function(e){
				$('#login-btn').attr({'disabled': 'disabled'});
				$('#login-btn').text('Signing in...');
				if ($('div').hasClass('has-error')) 
				{
					$('[data-toggle="popover"]').popover('show');
				}

				e.preventDefault();
				if (! $('div').hasClass('has-error')) {
					$.ajax({
						method: "POST",
						url: $loginForm.action,
						data: $loginForm.serialize()
					})
					.done(function( response ) {
						$('#login-btn').removeAttr('disabled');
						$('#login-btn').text('Login');

						if ('login' in response)
							window.location.href = response.login;
						else if ('error' in response)
						{
							var error =  '<div class="alert alert-important alert-warning">';
							error += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							error += '<strong>Oh Snap!</strong>';
							error += '<ul>';
							error += '<li>' + response.error + '</li>';
							error += '</ul>';
							error += '</div>';
							
							$loginForm.prepend(error);
						}
					});
				}
			});
		});
	</script>
@endsection