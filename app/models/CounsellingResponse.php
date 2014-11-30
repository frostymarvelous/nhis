<?php

class CounsellingResponse extends \Eloquent {
	protected $fillable = [];

	public static $rules = array(
        'response'=>'required|min:10',
    );
}