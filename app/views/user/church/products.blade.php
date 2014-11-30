@extends('layouts.user')

@section('content')



	<div class="row-fluid">								
		<div class="span9">
			&nbsp;
		</div>
			
		<div class="span3">
			<a href="{{ action('ChurchController@getProduct') }}" class="btn btn-info">Add Product</a>
		</div>
	</div>

	<br />

	<div class="row-fluid">
								<div class="span12">
									<div class="widget dark">
										<div class="widget-content no-padding">
											<div class="widget-content-inner">
												<table class="table table-striped tiny-tables" data-responsive="table">
													<thead>
														<tr>
															<th>Name</th>
															<th>Description</th>
															<th>Code</th>
															<th>Type</th>
															<th>Category</th>
															<th>Price</th>
															<th>Available</th>
															<th>Created At</th>
															<th>&nbsp;</th>
														</tr>
													</thead>
													<tbody>
														@foreach($products as $product)
														<tr class="odd gradeX">
															<td>{{ $product->name }}</td>
															<td>{{ str_limit($product->description, 25, '...') }}</td>
															<td>{{ $product->code }}</td>
															<td>{{ ucfirst($product->type) }}</td>
															<td>{{ $product->category->name }}</td>
															<td>USD {{ $product->price }}</td>
															<td>{{ $product->available ? 'Yes' : 'No' }}</td>
															<td>{{ $product->created_at }}</td>
															<th><a href="{{ action('ChurchController@getProduct', $product->id) }}">more</a></th>
														</tr>
														@endforeach
														@if(!count($products))
															<tr>
																<td>
																	&nbsp;
																</td>
																<td colspan="6">
																	You have no products!
																</td>
															</tr>
														@endif
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
											
						{{ $products->links() }}

@stop