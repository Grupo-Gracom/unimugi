 <!-- HEADER -->
 <header class="directify_fn_header_wrap" data-bg-type="light">
    	<div>
			<div class="directify_fn_header">
				<div class="header">
					<div class="directify_fn_header_logo">
						<a class="dark" href="index.html"><img src="{{asset('assets/img/logo-imugi.png')}}" alt=""></a>
						<a class="light" href="index.html"><img src="{{asset('assets/logo-light.png')}}" alt=""></a>
					</div>
					<div class="directify_fn_header_nav_list">
						<ul class="nav__hor">
							<li class="add_listing">
								<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img class="svg" src="{{asset('assets/img/icons/log.png')}}" alt=""><span>Logout</span></a>
								 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
							</li>
						</ul>
					</div>	
				</div>
			</div>
		</div>
    </header>
    <!-- /HEADER -->