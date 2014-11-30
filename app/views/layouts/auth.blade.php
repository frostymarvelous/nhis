	@include('common.head')
	
	<div id="wrapper" class="boxed">
        <div id="wrapper-inner" class="pattern7">

            <!-- Start Main Header -->
            <div id="main-header">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="title">
                                <h1>{{ Lang::get('app.app_name') }}</h1>
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Header -->
			
			
			
			<!-- Start Form -->
			<div id="login-content">
				<div class="row-fluid">
					<div class="span8 offset2">
						@include('errors')

						<div class="widget">
							<div class="widget-content no-padding">
								<div class="widget-content-inner">
									<div class="paper-ring"></div>
									
									@yield('form')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End Form-->

        </div>
    </div>
	
	@include('common.foot')
	