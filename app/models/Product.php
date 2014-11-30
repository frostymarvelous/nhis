<?php

class Product extends \Eloquent {
	protected $fillable = ['name', 'category_id', 'code', 'description', 'price', 'available', 'type'];

	public static $rules = [
		'name' => 'required|min:2',
		'code' => 'required|alpha_num|size:10|unique:products',
		'category_id' => 'required|integer',
		'description' => 'required|min:20',
		'price' => 'required|numeric',
		'available' => 'required|boolean',
		'image' => 'required|image|mimes:jpeg,jpg,png,gif',
		'type' => 'required|in:digital,physical'
	];

	public function category() {
		return $this->belongsTo('Category');
	}

	public function images() {
		return $this->hasMany('Image');
	}
}