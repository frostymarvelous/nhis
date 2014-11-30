@extends('layouts.user')

@section('content')


<div class="row-fluid">
	<div class="span12">

		<div class="row-fluid">
			<div class="span12">
				
				
				<div class="widget dark">
					<div class="widget-head"></div>
					<div class="widget-content no-padding">
						<div class="widget-content-inner">
							{{ Form::open(['action' => 'UserController@postRegister', 'method' => 'post', 'class' => 'form-horizontal register-wizard', 'files' => true]) }}
								<fieldset title="Details">
									<legend>Membership details</legend>
									
									<div class="control-group unique_number-control">
										<label class="control-label">Unique Number</label>
										<div class="controls">
											{{ Form::text('unique_number', null, ['class' => 'span12']) }}
											<span class="help-block unique_number-help" style="display: none;">This is required</span>											
										</div>
									</div>	
									<div class="control-group ssnit_number-control">
										<label class="control-label">SSNIT/Pension Number</label>
										<div class="controls">
											{{ Form::text('ssnit_number', null, ['class' => 'span12']) }}
											<span class="help-block ssnit-help" style="display: none;">This is required</span>											
										</div>
									</div>	
									
									<hr />
									
									<div class="control-group lastname-control">
										<label class="control-label">Lastname</label>
										<div class="controls">
											{{ Form::text('lastname', null, ['class' => 'span12']) }}
											<span class="help-block lastname-help" style="display: none;">This is required</span>											
										</div>
									</div>
									<div class="control-group firstname-control">
										<label class="control-label">Firstname</label>
										<div class="controls">
											{{ Form::text('firstname', null, ['class' => 'span12']) }}
											<span class="help-block firstname-help" style="display: none;">This is required</span>											
										</div>
									</div>
									<div class="control-group othernames-control">
										<label class="control-label">Othernames</label>
										<div class="controls">
											{{ Form::text('othernames', null, ['class' => 'span12']) }}
											<span class="help-block othernames-help" style="display: none;">This is required</span>											
										</div>
									</div>
									<div class="control-group gender-control">
										<label class="control-label">Gender</label>
										<div class="controls">
											{{ Form::select('gender', ['' => '', 'male' => 'Male', 'female' => 'Female', ], null, ['class' => 'span12',]) }}
											<span class="help-block gender-help" style="display: none;">This is required</span>											
										</div>
									</div>	
									<div class="control-group marital_status-control">
										<label class="control-label">Marital Status</label>
										<div class="controls">
											{{ Form::select('marital_status', ['' => '', 'single' => 'Single', 'married' => 'Married', 'divorced' => 'Divorced', 'widowed' => 'Widowed', ], null, ['class' => 'span12',]) }}
											<span class="help-block marital_status-help" style="display: none;">This is required</span>											
										</div>
									</div>
									
									<hr />
									
									<div class="control-group occupation-control">
										<label class="control-label">Occupation</label>
										<div class="controls">
											{{ Form::text('occupation', null, ['class' => 'span12']) }}
											<span class="help-block occupation-help" style="display: none;">This is required</span>											
										</div>
									</div>
									<div class="control-group company-control">
										<label class="control-label">Company</label>
										<div class="controls">
											{{ Form::text('company', null, ['class' => 'span12']) }}
											<span class="help-block company-help" style="display: none;">This is required</span>											
										</div>
									</div>							
								</fieldset>
								<fieldset title="Contacts">
									<legend>Emergency contacts</legend>

									<div class="control-group">
										<h3>Contact One</h3>
									</div>
									<div class="control-group contact_1_name-control">
										<label class="control-label">Name</label>
										<div class="controls">
											{{ Form::text('contacts[0][name]', null, ['class' => 'span12']) }}
											<span class="help-block contact_1_name-help" style="display: none;">This is required</span>											
										</div>
									</div>	
									<div class="control-group contact_1_relationship-control">
										<label class="control-label">Relationship</label>
										<div class="controls">
											{{ Form::select('contacts[0][relationship]', [
																'' => '',
																'wife' => 'Wife', 
																'husband' => 'Husband',
																'mother' => 'Mother', 
																'father' => 'Father',
																'daughter' => 'Daughter',
																'son' => 'Son',  
																'brother' => 'Brother', 
																'sister' => 'Sister', 
																'uncle' => 'Uncle',  
																'aunt' => 'Aunt', 
																'nephew' => 'Nephew', 
																'niece' => 'Niece', 
																'other' => 'Other', 
															], null, ['class' => 'span12',]) }}
											<span class="help-block contact_1_relationship-help" style="display: none;">This is required</span>											
										</div>
									</div>
									<div class="control-group contact_1_number-control">
										<label class="control-label">Number</label>
										<div class="controls">
											{{ Form::text('contacts[0][number]', null, ['class' => 'span12']) }}
											<span class="help-block contact_1_number-help" style="display: none;">This is required</span>											
										</div>
									</div>		

									<div class="control-group">
										<h3>Contact Two</h3>
									</div>
									<div class="control-group contact_2_name-control">
										<label class="control-label">Name</label>
										<div class="controls">
											{{ Form::text('contacts[1][name]', null, ['class' => 'span12']) }}
											<span class="help-block contact_2_name-help" style="display: none;">This is required</span>											
										</div>
									</div>	
									<div class="control-group contact_2_relationship-control">
										<label class="control-label">Relationship</label>
										<div class="controls">
											{{ Form::select('contacts[1][relationship]', [
																'' => '',
																'wife' => 'Wife', 
																'husband' => 'Husband', 
																'mother' => 'Mother', 
																'father' => 'Father',
																'daughter' => 'Daughter',
																'son' => 'Son',  
																'brother' => 'Brother', 
																'sister' => 'Sister', 
																'uncle' => 'Uncle',  
																'aunt' => 'Aunt', 
																'nephew' => 'Nephew', 
																'niece' => 'Niece', 
																'other' => 'Other', 
															], null, ['class' => 'span12',]) }}
											<span class="help-block contact_2_relationship-help" style="display: none;">This is required</span>											
										</div>
									</div>
									<div class="control-group contact_2_number-control">
										<label class="control-label">Number</label>
										<div class="controls">
											{{ Form::text('contacts[1][number]', null, ['class' => 'span12']) }}
											<span class="help-block contact_2_number-help" style="display: none;">This is required</span>											
										</div>
									</div>											
								</fieldset>
								<fieldset title="Payment">
									<legend>Membership payment</legend>
									<div class="control-group btc-control">
										<div class="controls">
											<input type="text" placeholder="Name" name="name" class="span12">
											<span class="help-block btc-help" style="display: none;">Minimum BTC before charges allowed is 0.001 BTC</span>											
										</div>
									</div>	
								</fieldset>
								{{ Form::token() }}
								<input type="submit" class="btn btn-primary finish stepy-finish" value="Confirm" />
							{{ Form::close() }}
						</div>
					</div>
				</div>

				
				
			</div>
		</div>
		
		
	</div>
</div>
							
@stop

@section('extra_js')
<script src="{{ URL::asset('js/register.js') }}"></script>
@stop