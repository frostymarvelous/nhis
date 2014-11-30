@extends('layouts.user')

@section('content')



	<div class="row-fluid">								
		<div class="span9">
			&nbsp;
		</div>
			
		<div class="span3">
			<a href="{{ action('ChurchController@getSpeaker') }}" class="btn btn-info">Add Speaker</a>
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
															<th>Email</th>
															<th>Registered</th>
															<th>Created At</th>
															<th>&nbsp;</th>
														</tr>
													</thead>
													<tbody>
														@foreach($speakers as $speaker)
														<tr class="odd gradeX">
															<td>{{ $speaker->name }}</td>
															<td>{{ $speaker->email }}</td>
															<td>{{ $speaker->password ? 'Yes' : 'No' }}</td>
															<td>{{ $speaker->created_at }}</td>
															<td><a href="{{ action('ChurchController@getSpeaker', $speaker->id) }}">more</a></td>
														</tr>
														@endforeach
														@if(!count($speakers))
															<tr>
																<td>
																	&nbsp;
																</td>
																<td colspan="4">
																	You have no speakers!
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
											
						{{ $speakers->links() }}

@stop