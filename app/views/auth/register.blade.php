@extends('layouts.auth')

@section('form')


	<!-- Start Registration Form -->
	<div class="login-area">
		<h3><i class="icon iconfa-unlock"></i> Register a new account</h3><hr>
		
        {{ Form::open(array('action' => 'AuthController@postRegister', 'method' => 'post')) }}
			{{ Form::text('name', null, ['placeholder' => Lang::get('app.name'), 'class' => 'input-block-level', 'required']) }}
			{{ Form::email('email', null, ['placeholder' => Lang::get('app.email'), 'class' => 'input-block-level', 'required']) }}
			{{ Form::password('password', ['placeholder' => Lang::get('app.password'), 'class' => 'input-block-level', 'required']) }}
			{{ Form::password('password_confirmation', ['placeholder' => Lang::get('app.confirm_password'), 'class' => 'input-block-level', 'required']) }}
			{{ Form::token() }}
			<br>
			
			<button class="btn btn-block btn-success">{{ Lang::get('app.register') }}</button> 			
			<div class="clearfix"></div>
		{{ Form::close() }}
		<br />
		
		<a href="{{ action('AuthController@getLogin') }}" class="btn">I already have an account</a>
		<div class="clearfix"></div>
	</div><!-- End Registration Form -->
							
						

@stop
