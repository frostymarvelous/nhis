@extends('layouts.user')

@section('content')


	<div class="widget">
			<div class="widget-content no-padding">
				<div class="widget-content-inner">

					@if(isset($speaker))
						{{ Form::model($speaker, ['action' => ['ChurchController@postSpeaker', $speaker->id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) }}
					@else
						{{ Form::open(['action' => 'ChurchController@postSpeaker', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) }}
					@endif

						<div class="control-group">
							{{ Form::label('name', 'Speaker Name', ['class' => 'control-label']) }}
							<div class="controls">
								{{ Form::text('name', null, ['class' => 'span12', 'placeholder' => 'Speaker\'s fullname', 'required']) }}
							</div>
						</div>
						<div class="control-group">
							{{ Form::label('code', 'Speaker Email', ['class' => 'control-label']) }}
							<div class="controls">
								{{ Form::email('email', null, ['class' => 'span12', 'placeholder' => 'Speaker will be sent an email to confirm', 'required']) }}
							</div>
						</div>
						@if(isset($speaker))
						<div class="control-group">
							Registered
							<div class="controls">
								{{ $speaker->password ? 'Yes' : 'No' }}
							</div>
						</div>
						@endif
						
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