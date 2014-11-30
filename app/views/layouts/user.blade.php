	@include('common.head')
	
	<div id="wrapper" class="fixed">
        <div id="wrapper-inner" class="pattern7">

            <!-- Start Main Header -->
            <div id="main-header">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="title">
                                <h1>{{ Lang::get('app.app_name') }}</h1>
                            </div>
							<!-- Start Header Panel -->
							<div class="header-panel">
								<a href="#" class="menu" id="menu-phone" data-menu="mobile"><i class="iconfa-tasks"></i></a>
							</div>
							<!-- End Header Panel -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Header -->
			
			
			
			<!-- Start Sidebar -->
			<div id="sidebar"  class="simple">
				
				<!-- Start Main Menu -->
				<ul class="nav-mainmenu" id="nav-mainmenu">
					
					{{--*/ 
						$route = Route::currentRouteAction();
						$parts = explode('@', $route); 
						$menu = [
							'home' => [	
								'name' => 'Home',
								'icon' => 'iconfa-home',
								'controller' => 'UserController',
								'subs' => [
										[ 
										'action' => 'UserController@getIndex',
										'icon' => 'iconfugue16-dashboard',
										'name' => 'Dashboard',	
									],
										[ 
										'action' => 'UserController@getRegister',
										'icon' => 'iconfugue16-dashboard',
										'name' => 'Register',	
									],
								],	
							],	
							[
								'name' => 'Patients',
								'icon' => 'iconfa-home',
								'controller' => 'UserController',
								'subs' => [
										[ 
										'action' => 'UserController@getIndex',
										'icon' => 'iconfugue16-dashboard',
										'name' => 'Dashboard',	
									],
								],
							],
							[							
								'name' => 'Employees',
								'icon' => 'iconfa-home',
								'controller' => 'UserController',
								'subs' => [
										[ 
										'action' => 'UserController@getIndex',
										'icon' => 'iconfugue16-dashboard',
										'name' => 'Nurses',	
									],
										[ 
										'action' => 'UserController@getIndex',
										'icon' => 'iconfugue16-dashboard',
										'name' => 'Surgeons',	
									],
										[ 
										'action' => 'UserController@getIndex',
										'icon' => 'iconfugue16-dashboard',
										'name' => 'Dentists',	
									],
								],	
							],
						];
					/*--}}
					
					@foreach($menu as $key => $value)
						<!-- Start Menu -->
						<li class="accordion-group">
							<a data-toggle="collapse" data-parent="#nav-mainmenu" href="#{{ $key }}">
								<span class="icon {{ $value['icon'] }}"></span>
								<span class="text">{{ $value['name'] }}</span>
							</a>
							<ul class="nav-submenu collapse  @if($parts[0] == $value['controller']) in @endif" id="{{ $key }}">
							@foreach($value['subs'] as $sub)
							<!-- Start Sub Menu -->
								<li><a href="{{ @action($sub['action']) }}" @if($route == $sub['action'])class="active"@endif><span class="icon {{ $sub['icon'] }}"></span>{{ $sub['name'] }}</a></li>
							<!-- End Sub Menu -->
							@endforeach
							</ul>
						</li>
						<!-- End Menu -->		
					@endforeach
					
					 
				</ul>
				<!-- End Main Menu -->
			</div>
			<!-- End Sidebar -->
			
			<!-- Start Main Content -->
			<div id="main-content" style="min-height: 1000px"  class="simple">
				<p>&nbsp;</p>
				<!-- Start Breadcrumb -->
				<ul class="breadcrumb">
					@foreach($breadcrumbs as $label => $url)
                    <li><a href="{{ $url }}">{{ $label }}</a></li>
					@endforeach
                </ul>
				<!-- End Breadcrumb -->
				
				<h3>{{ $title }} <small>{{ $description }}</small></h3>
				<hr class="style1">
				
				
				<div class="row-fluid">
                    <div class="span12">				
						@include('errors')
					</div>
				</div>
				
				<!-- Start Main Content -->
				<div class="row-fluid">
					<div class="span12">
					
						@yield('content')
						
                    </div>
                </div>
				<!-- Start Main Content -->
			</div>
			<!-- End Main Content -->

        </div>
    </div>
	
	@include('common.foot')
	