@extends('layouts.auth')

@section('form')


	<!-- Start Registration Form -->
	<div class="login-area">
		<h3>Password Reminder</h3><hr>
		
        {{ Form::open(array('action' => 'RemindersController@postRemind', 'method' => 'post')) }}
			{{ Form::email('email', null, ['placeholder' => Lang::get('app.email'), 'class' => 'input-block-level', 'required']) }}
			<br>
			{{ Form::token() }}
			
			<button class="btn btn-block btn-success">{{ Lang::get('app.submit') }}</button> 
			
			<div class="clearfix"></div>
		{{ Form::close() }}
		<br />
		
		<a href="{{ action('AuthController@getLogin') }}">Login</a>
		<div class="clearfix"></div>
	</div><!-- End Registration Form -->
							
						

@stop

