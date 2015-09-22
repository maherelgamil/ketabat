@extends('app')

@section('content')
	<article class="register">
		<h1 class="text-center"><i class="fa fa-user-plus"></i> Register</h1>
		@include ('errors.form', ['errors' => $errors])

		{!! Form::open(['url' => '/auth/register', 'method' => 'POST']) !!}
			<div class="form-group">
				{!! Form::label('email', 'E-Mail Address: ') !!}
				{!! Form::input('email', 'email', null, ['class' => 'form-control', 'data-validate' => url('ajax/validate'), 'data-forget' => url('password/email')]) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password', 'Password: ') !!}
				{!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password_confirmation', 'Password Confirmation: ') !!}
				{!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default">
					Register
				</button>
				<button type="button" class="btn btn-link"><a href="{{ url('auth/login') }}">Already have an account?</a></button>
			</div>
		{!! Form::close() !!}
	</article>
@endsection

@section ('footer')
	<script type="text/javascript">
		jQuery(document).ready(function () {
		    "use strict";
		    var options = {};
		    options.ui = {
		        showVerdictsInsideProgressBar: true,
		        showProgressBar: true,
		        useVerdictCssClass: true
		    };
			
			$('input[name=password]').pwstrength(options);

			$('#email').change(function(){
					var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,10})+$/;
					if (regex.test($(this).val())) 
					{
						//changeInput('#email', 'success', '');
						changeInput('#email', 'wait', '');
						$.ajax({
							method: "GET",
							url: $(this).data('validate') + '/' + $(this).val().replace(/.([^.]*)$/, '!' + '$1')
						})
						.done(function( response ) {
							if (response.email == 0)
								changeInput('#email', 'success', '');
							if (response.email == 1)
								changeInput('#email', 'error', "This email already registered.");
						});

					}

					else 
						changeInput('#email', 'error', 'Your email address is invalid')

			});

			$('#password').change(function(){
				if($(this).val().length >= 6)
					changeInput('#password', 'success', '');
				else
					changeInput('#password', 'error', 'Password should be at least 6 charecters.');
			});

			$('#password_confirmation').change(function(){
				if($(this).val() == $('#password').val()) 
				{
					changeInput('#password_confirmation', 'success', '');
				}
				else
				{
					changeInput('#password_confirmation', 'error', 'Password confirmation doesn\'t match the password');
				}
			});

			$( "form" ).submit(function( event ) {
				if ($('div').hasClass('has-error'))
				{
					$('[data-toggle="popover"]').popover('show');
					event.preventDefault();
				}
			});
		});
	</script>
@endsection