
	
	@if(Session::has('success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Success!</strong> {{ Session::get('success') }}
	</div>
	@endif
	@if(Session::has('info'))
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Info!</strong> {{ Session::get('info') }}
	</div>
	@endif
	@if(Session::has('warning'))
	<div class="alert">
		<button type="button" class="close" data-dismiss="alert">&times;/button>
		<strong>Warning!</strong> {{ Session::get('warning') }}
	</div>
	@endif
	@if(Session::has('error') || count($errors))
	<div class="alert alert-danger">
		@if(Session::has('error'))
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error!</strong> {{ Session::get('error') }}
		@endif
		
		@if(count($errors))
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
	@endif
	

