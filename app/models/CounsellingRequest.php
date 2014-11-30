<?php

class CounsellingRequest extends \Eloquent {
	protected $fillable = [];

	public function responses()
    {
        return $this->hasMany('CounsellingResponse');
    }
}