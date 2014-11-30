@extends('layouts.auth')

@section('form')

	<!-- Start Registration Form -->
	<div class="login-area">
		<h3>Reset Password</h3><hr>
		
        {{ Form::open(array('action' => 'RemindersController@postReset', 'method' => 'post')) }}
			{{ Form::email('email', null, ['placeholder' => Lang::get('app.email'), 'class' => 'input-block-level', 'required']) }}
			{{ Form::password('password', ['placeholder' => Lang::get('app.password'), 'class' => 'input-block-level', 'required']) }}
			{{ Form::password('password_confirmation', ['placeholder' => Lang::get('app.confirm_password'), 'class' => 'input-block-level', 'required']) }}
			{{ Form::hidden('token', $token) }}
			<br>
			{{ Form::token() }}
			
			<button class="btn btn-block btn-success">{{ Lang::get('app.register') }}</button> 
			
			<div class="clearfix"></div>
		{{ Form::close() }}
		<br />
		
		<a href="{{ action('AuthController@getLogin') }}" class="btn">I already have an account</a>
		<div class="clearfix"></div>
	</div><!-- End Registration Form -->
							
							
@stop

