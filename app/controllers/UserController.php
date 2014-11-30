<?php

class UserController extends \BaseController {

	public function __construct()
    {
        //$this->beforeFilter('auth');
    }
	
	public function getIndex()
	{
		return View::make('user.index', [
										'title' => 'Dashboard',
										'description' => '',
										'breadcrumbs' => [
											'Home' => 'javascript:void(0);', 
											'Dashboard' => action('UserController@getIndex')
										],		
									]);
	}
	
	public function getRegister()
	{
		return View::make('user.register', [
										'title' => 'Register',
										'description' => 'Register a new member',
										'breadcrumbs' => [
											'Home' => 'javascript:void(0);', 
											'Register' => action('UserController@getRegister')
										],		
									]);
	}
	
	public function postRegister()
	{
		return Redirect::to(action('UserController@getRegister'))
								->with('error', 'Try again!')
								->withInput();
	}
	
	public function getProducts()
	{
		return View::make('user.church.products', [
										'products' => Auth::user()->products()->paginate(25),
										'title' => 'Products',
										'description' => 'Products you have offerred for sale in the shop',
										'breadcrumbs' => [
											'Church' => 'javascript:void(0);', 
											'Products' => action('ChurchController@getProducts')
										],		
									]);
	}

	public function getProduct($product_id = null) {

		if($product_id) {
			$product = Product::find($product_id);
			if(!$product)
				App::abort(404);

			$params = [
					'product' => $product,
					'title' => 'Product',
					'description' => '',
					'breadcrumbs' => [
						'Church' => 'javascript:void(0);', 
						'Products' => action('ChurchController@getProducts'),
						$product->name => action('ChurchController@getProduct', $product->id),
					],
				];
		}
		else {
			$params = [
					'title' => 'Create Product',
					'description' => 'Create a new product',
					'breadcrumbs' => [
						'Church' => 'javascript:void(0);', 
						'Products' => action('ChurchController@getProducts'),
						'Create Product' => action('ChurchController@getProduct'),
					],
				];
		};
		$params['categories'] = Category::orderBy('name')->lists('name', 'id');

		return View::make('user.church.product', $params);
	}

	public function postProduct($product_id = null) 
	{
		$rules = Product::$rules;

		if($product_id == null) {
				$product = new Product();
		}
		else {
			$product = Product::find($product_id);
			if(!$product)
				App::abort(404);

			$rules['image'] = 'image|mimes:jpeg,jpg,png,gif';
	
			if($product->code == Input::get('code'))
				$rules['code'] = 'required|alpha_num|size:6';
		}

    
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes()) 
		{
			$path = storage_path() . '/products/items';

			if(Input::get('type') == 'digital') {
				if(Input::hasFile('item')) {
					if (!file_exists($path)) {
					    File::makeDirectory($path, 0777, true, true);
					}

					$item = Input::file('item');

					if($item->isValid()) {
						if($product_id == null || !$product->file)
							$file = str_random(19) . '-' . str_pad(Auth::user()->id, 10, '0', STR_PAD_LEFT);
						else
							$file = $product->file;

						$product->file = $file;
						$product->extension = strtoupper($item->getClientOriginalExtension());

						$item->move($path, $product->file . '.' . $product->extension);
					}
				}
				else if($product_id == null || !$product->file)
					return Redirect::to(action('ChurchController@getProduct', $product_id))
								->with('error', 'Product Item is required for digital goods!')
								->withErrors($validator)
								->withInput();

			}
			else if($product->file) {
				unlink($path . '/' . $product->file . '.' . $product->extension);
				$product->file = null;
				$product->extension = null;				
			}
			
			$product->fill(Input::all());
			$product->user_id = Auth::user()->id;
			$product->save();

			
			if(Input::hasFile('image')) {
				$path = public_path() . '/images/products/';
				if (!file_exists($path)) {
				    File::makeDirectory($path, 0777, true, true);
				}

				Image::make(Input::file('image'))->fit(350, 500)->save( $path . $product->id . '.jpg');
			}

			return Redirect::to(action('ChurchController@getProduct', $product->id))
								->with('success', 'Product saved successfully');
		}
		else 
		{
			return Redirect::to(action('ChurchController@getProduct', $product_id))
								->with('error', Lang::get('messages.generic_error'))
								->withErrors($validator)
								->withInput();  
		}
	}

	public function getSpeakers()
	{
		return View::make('user.church.speakers', [
											'speakers' => Auth::user()->speakers()->paginate(25),
											'title' => 'Speakers',
											'description' => 'Speakers in your church',
											'breadcrumbs' => [
												'Church' => 'javascript:void(0);', 
												'Speakers' => action('ChurchController@getSpeakers')
											],
											
													
									]);
	}

	public function getSpeaker($speaker_id = null)
	{
		if($speaker_id) {
			$speaker = User::find($speaker_id);
			if(!$speaker)
				App::abort(404);

			$params = [
					'speaker' => $speaker,
					'title' => 'Speaker',
					'description' => 'Modify speaker',
					'breadcrumbs' => [
						'Church' => 'javascript:void(0);', 
						'Speakers' => action('ChurchController@getSpeakers'),
						$speaker->name => action('ChurchController@getSpeaker', $speaker->id),
					],
				];
		}
		else {
			$params = [
					'title' => 'Create Speaker',
					'description' => 'Create a new speaker',
					'breadcrumbs' => [
						'Church' => 'javascript:void(0);', 
						'speakers' => action('ChurchController@getSpeakers'),
						'Create speaker' => action('ChurchController@getSpeaker'),
					],
				];
		};

		return View::make('user.church.speaker', $params);
	}

	public function postSpeaker($speaker_id = null) 
	{
		$rules = User::$speakerCreateRules;

		if($speaker_id == null) {
			$speaker = new User();
		}
		else {
			$speaker = User::find($speaker_id);
			if(!$speaker)
				App::abort(404);

			if($speaker->email == Input::get('email'))
				unset($rules['email']);
		}

    
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes()) 
		{
			$speaker->fill(Input::all());			
			if(!$speaker_id) {				
				$speaker->speaker_code = str_random(30);
				$speaker->church_id = Auth::user()->id;
			}			
			$speaker->save();
			
			if(!$speaker_id || (isset($rules['email']) && !$speaker->password)) {	
				
				Mail::send('emails.user.speaker', ['speaker_code' => $speaker->speaker_code], function($message)
				{
					$message->to(Input::get('email'), Input::get('name'))->subject('Welcome to Life Resourcery!');
				});
				
				return Redirect::to(action('ChurchController@getSpeaker', $speaker->id))
									->with('success', 'Speaker created successfully.')
									->with('info', 'Speaker has been sent an email to confirm.');
			}
			else
				return Redirect::to(action('ChurchController@getSpeaker', $speaker->id))
									->with('success', 'Speaker updated successfully.');
		}
		else 
		{
			return Redirect::to(action('ChurchController@getSpeaker', $speaker_id))
								->with('error', Lang::get('messages.generic_error'))
								->withErrors($validator)
								->withInput();  
		}
	}

}