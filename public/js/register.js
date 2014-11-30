$('.register-wizard').stepy({
		backLabel:  'Previous',
		block:      true,
		errorImage: true,
		nextLabel:  'Next',
		validate:   false,
		next: function(index) {
			$('.control-group').removeClass('error');
			$('.help-block').hide();
			
			

			
		}
	});