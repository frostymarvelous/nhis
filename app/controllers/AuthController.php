<?php

class AuthController extends Controller {

	public function __construct()
    {
        $this->beforeFilter('guest');
    }
	
	
	public function getLogin()
	{
		return View::make('auth.login');
	}	
	
	public function postLogin()
	{
		if ( Auth::attempt([
				'email' => Input::get('email'), 
				'password' => Input::get('password'), 
				'confirmed' => 1
			], Input::get('remember'))
		) 
		{
			return Redirect::to(action('UserController@getIndex'));
		} 
		else 
		{
			return Redirect::to(action('AuthController@getLogin'))
				->with('error', Lang::get('user.invalid_credentials'))
				->withInput();
		}
	}
	
	
	public function getVerify($confirmation_code = null)
	{
		if($confirmation_code == null) App::abort(404);
		
		$user = User::whereConfirmationCode($confirmation_code)->first();

		if ( ! $user)
		{
			return Redirect::to('login')->with('error', Lang::get('user.invalid_confirmation'));
		}
		else
		{
			$user->confirmed = 1;
			$user->confirmation_code = null;
			$user->save();

			return Redirect::to(action('AuthController@getLogin'))->with('success', Lang::get('user.email_confirmed'));
		}
	}	
	
	public function getRegister()
	{
		return View::make('auth.register');
	}
	
	public function postRegister()
	{
		$validator = Validator::make(Input::all(), User::$rules);
    
		if ($validator->passes()) 
		{
			$user = new User;
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->confirmation_code = str_random(30);
			$user->save();
			
			//Auth::login($user); //for auto logging users in
			
			Mail::send('emails.user.verify', ['confirmation_code' => $user->confirmation_code], function($message)
			{
				$message->to(Input::get('email'), Input::get('name'))->subject('Welcome to Life Resourcery!');
			});
		 
			return Redirect::to(action('AuthController@getLogin'))
								->with('success', Lang::get('user.registration_complete'));
		} 
		else 
		{
			return Redirect::to(action('AuthController@getRegister'))
								->with('error', Lang::get('messages.generic_error'))->withErrors($validator)->withInput();  
		}
	}

	public function getSpeaker($speaker_code = null)
	{
		if($speaker_code == null) App::abort(404);
		
		$user = User::whereSpeakerCode($speaker_code)->first();

		if ( ! $user) App::abort(404);

		return View::make('auth.speaker')->with('name', $user->name);
	}
	
	public function postSpeaker($speaker_code = null)
	{
		if($speaker_code == null) App::abort(404);
		
		$user = User::whereSpeakerCode($speaker_code)->first();

		if ( ! $user) App::abort(404);


		$validator = Validator::make(Input::all(), User::$speakerRegisterRules);
    
		if ($validator->passes()) 
		{
			$user->speaker_code = null;
			$user->password = Hash::make(Input::get('password'));
			$user->confirmed = 1;
			$user->save();
		 
			return Redirect::to(action('AuthController@getLogin'))
								->with('success', Lang::get('user.registration_complete'));
		} 
		else 
		{
			return Redirect::to(action('AuthController@getSpeaker', $speaker_code))
								->with('error', Lang::get('messages.generic_error'))->withErrors($validator)->withInput();  
		}
	}


}
