<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable = ['name', 'email'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    
    public static $rules = array(
        'name'=>'required|min:2',
        'email'=>'required|email|unique:users',
        'password'=>'required|alpha_num|min:8|confirmed',
    );

    public static $speakerCreateRules = array(
        'name'=>'required|min:2',
        'email'=>'required|email|unique:users',
    );

    public static $speakerRegisterRules = array(
        'password'=>'required|alpha_num|min:8|confirmed',
    );
	
	public function products()
    {
        return $this->hasMany('Product');
    }

    public function speakers()
    {
        return $this->hasMany('User');
    }

    public function counsellings()
    {
        return CounsellingRequest::
                    whereNull('counsellor_id')
                    ->orWhere('counsellor_id', $this->id);
    }

}
