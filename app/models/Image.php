<?php

class Image extends \Eloquent {
	protected $fillable = [];

	public static $rules = [
		'image' => 'required|image|mimes:jpeg,jpg,png,gif',
	];

	public function Product() {
		return $this->belongsTo('Product');
	}
}