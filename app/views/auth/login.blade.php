@extends('layouts.auth')

@section('form')


	<!-- Start Login Form -->
	<div class="login-area">
		<h3><i class="icon iconfa-lock"></i> Please login</h3><hr>
		{{ Form::open(array('action' => 'AuthController@postLogin', 'method' => 'post')) }}
			<input name="email" type="email" placeholder="{{ Lang::get('app.email') }}" class="input-block-level" required>
			<input name="password" type="password" placeholder="{{ Lang::get('app.password') }}" class="input-block-level" required>
			<label><input type="checkbox" name="remember" data-style="checkbox">{{ Lang::get('app.remember') }}</label>
			<br>
			{{ Form::token() }}
			
			<button class="btn btn-block btn-success">{{ Lang::get('app.login') }}</button> 
			
			<div class="clearfix"></div>
		{{ Form::close() }}
		<br />
		
		<a href="{{ action('AuthController@getRegister') }}" class="btn">Register a new account</a> 
		<a href="{{ action('RemindersController@getRemind') }}">{{ Lang::get('app.user.forgotten_password') }}</a>
			<div class="clearfix"></div>
	</div><!-- End Login Form -->
							
						

@stop