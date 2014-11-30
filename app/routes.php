<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//enable csrf on all requests
Route::when('*', 'csrf', ['post', 'put', 'delete']);

Route::controller('', 'UserController');




Route::get('/logout', ['before' => 'auth', function()
{
	Auth::logout();
    return Redirect::to(action('AuthController@getLogin'))->with('info', Lang::get('user.logged_out'));
}]);