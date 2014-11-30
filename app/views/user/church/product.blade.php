@extends('layouts.user')

@section('content')


	<div class="widget">
			<div class="widget-content no-padding">
				<div class="widget-content-inner">

					@if(isset($product))
						{{ Form::model($product, ['action' => ['ChurchController@postProduct', $product->id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) }}
					@else
						{{ Form::open(['action' => 'ChurchController@postProduct', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) }}
					@endif

						<div class="control-group">
							{{ Form::label('image', 'Product Image (350x500)', ['class' => 'control-label']) }}
							<div class="controls">
								@if(isset($product))
								<img src="{{ asset('images/products/'. $product->id . '.jpg') }}" alt="{{ $product->name }}" title="{{ $product->name }}" />
								@endif
								{{ Form::file('image', ['class' => 'span12', isset($product) ? '' : 'required']) }}
							</div>
						</div>
						<div class="control-group">
							{{ Form::label('name', 'Product Name', ['class' => 'control-label']) }}
							<div class="controls">
								{{ Form::text('name', null, ['class' => 'span12', 'required']) }}
							</div>
						</div>
						<div class="control-group">
							{{ Form::label('code', 'Product Code', ['class' => 'control-label']) }}
							<div class="controls">
								{{ Form::text('code', isset($product) ? null : strtoupper(str_random(10)) , ['class' => 'span12', 'placeholder' => 'a unique random six character string e.g. X112UBA', 'required']) }}
							</div>
						</div>
						<div class="control-group">
							{{ Form::label('description', 'Product Description', ['class' => 'control-label']) }}
							<div class="controls">
								{{ Form::textarea('description', null, ['class' => 'span12', 'required']) }}
							</div>
						</div>
						<div class="control-group">
							{{ Form::label('category_id', 'Product Category', ['class' => 'control-label']) }}
							<div class="controls">
								{{ Form::select('category_id', $categories, null, ['class' => 'span12', 'required']) }}
							</div>
						</div>
						<div class="control-group">
							{{ Form::label('price', 'Product Price (USD)', ['class' => 'control-label']) }}
							<div class="controls">
								{{ Form::number('price', null, ['class' => 'span12', 'step' => '0.01', 'required']) }}
							</div>
						</div>
						<div class="control-group">
							{{ Form::label('available', 'Product Available', ['class' => 'control-label']) }}
							<div class="controls">
									Yes {{ Form::radio('available', '1') }}
									No {{ Form::radio('available', '0') }}
							</div>
						</div>

						<hr />
						<div class="control-group">
							{{ Form::label('type', 'Product Type', ['class' => 'control-label']) }}
							<div class="controls">
								{{ Form::select('type', ['digital' => 'Digital', 'physical' => 'Physical'], null,  ['class' => 'span12', 'required']) }}
							</div>
						</div>
						<div class="control-group">
							{{ Form::label('item', 'Product Item (For digital products only)', ['class' => 'control-label']) }}
							<div class="controls">
								{{ Form::file('item', ['class' => 'span12']) }}
								@if(isset($product) && $product->type == 'digital')
									Current File Type: <b>.{{ $product->extension }}</b>
								@endif
							</div>
						</div>
						
						<div class="form-actions">
							{{ Form::token() }}
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="" class="btn">Reset Fields</a>
						</div>
					{{ Form::close() }}


				</div>
			</div>
		</div>

@stop