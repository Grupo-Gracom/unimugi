@extends('layouts.template')
@section('titulo','UNIMUGI | Marketing')
@section('conteudo')
<!-- WRAPPER ALL -->
<div class="directify_fn_wrapper_all">
	@include('layouts.menus.mobile')
    @include('layouts.header.header')
    
    <!-- CONTENT -->
    <div class="directify_fn_content">
    	
    	<!-- DASHBOARD -->
    	<div class="directify_fn_dashboard_wrapper">
    		
    		<!-- DASHBOARD BACKGROUND -->
    		<div class="dashboard_bg">
    			<div class="overlay_color"></div>
    			<div class="overlay_image jarallax" data-speed="0.2"></div>
    		</div>
    		<!-- /DASHBOARD BACKGROUND -->
    		
    		<!-- DASHBOARD CONTENT -->
    		<div class="container">
    			<div class="dashboard_content">
                    @include('layouts.menus.sidebar')
					
					<div class="dashboard_wrap sticky_sidebar">
					@include('layouts.menus.sidebar_mobile')	
						<div class="dashboard">
							<div class="listings__active">
								<div class="title_holder">
									<h3>Marketing</h3>
								</div>
								<div class="active__single">
									<div class="img_holder">
										<img src="img\dashboard\active-1.jpg" alt="">
									</div>
									<div class="content">
										<p><a class="name" href="#">The Lombardy</a> — <span class="time_duration unlimited">Unlimited Days Left</span></p>
										<p>March 15, 2017 / <a class="edit" href="#">Edit</a> / <a class="delete" href="#">Delete</a></p>
									</div>
								</div>
								<div class="active__single">
									<div class="img_holder">
										<img src="img\dashboard\active-2.jpg" alt="">
									</div>
									<div class="content">
										<p><a class="name" href="#">Casablanca Hotel</a> — <span class="time_duration limited">2 Days Left</span></p>
										<p>March 15, 2017 / <a class="edit" href="#">Edit</a> / <a class="delete" href="#">Delete</a></p>
									</div>
								</div>
								<div class="active__single">
									<div class="img_holder">
										<img src="img\dashboard\active-3.jpg" alt="">
									</div>
									<div class="content">
										<p><a class="name" href="#">Rock Star Crystals</a> — <span class="time_duration limited">1 Day Left</span></p>
										<p>March 15, 2017 / <a class="edit" href="#">Edit</a> / <a class="delete" href="#">Delete</a></p>
									</div>
								</div>
								<div class="active__single">
									<div class="img_holder">
										<img src="img\dashboard\active-4.jpg" alt="">
									</div>
									<div class="content">
										<p><a class="name" href="#">Butcher Bar</a> — <span class="time_duration unlimited">Unlimited Days Left</span></p>
										<p>March 15, 2017 / <a class="edit" href="#">Edit</a> / <a class="delete" href="#">Delete</a></p>
									</div>
								</div>
								<div class="active__single">
									<div class="img_holder">
										<img src="img\dashboard\active-5.jpg" alt="">
									</div>
									<div class="content">
										<p><a class="name" href="#">Honey Badger</a> — <span class="time_duration limited">20 Days Left</span></p>
										<p>March 15, 2017 / <a class="edit" href="#">Edit</a> / <a class="delete" href="#">Delete</a></p>
									</div>
								</div>
								<div class="active__single">
									<div class="img_holder">
										<img src="img\dashboard\active-6.jpg" alt="">
									</div>
									<div class="content">
										<p><a class="name" href="#">Brooklyn Bridge Park</a> — <span class="time_duration unlimited">Unlimited Days Left</span></p>
										<p>March 15, 2017 / <a class="edit" href="#">Edit</a> / <a class="delete" href="#">Delete</a></p>
									</div>
								</div>
								<div class="active__single">
									<div class="img_holder">
										<img src="img\dashboard\active-7.jpg" alt="">
									</div>
									<div class="content">
										<p><a class="name" href="#">iPic Theaters</a> — <span class="time_duration unlimited">Unlimited Days Left</span></p>
										<p>March 15, 2017 / <a class="edit" href="#">Edit</a> / <a class="delete" href="#">Delete</a></p>
									</div>
								</div>
								<div class="active__single">
									<div class="img_holder">
										<img src="img\dashboard\active-8.jpg" alt="">
									</div>
									<div class="content">
										<p><a class="name" href="#">Nitehawk Cinema</a> — <span class="time_duration unlimited">Unlimited Days Left</span></p>
										<p>March 15, 2017 / <a class="edit" href="#">Edit</a> / <a class="delete" href="#">Delete</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
   			
    			</div>
    		</div>
    		<!-- DASHBOARD CONTENT -->
    		
    	</div>
    	<!-- /DASHBOARD -->
    	
    </div>
   
</div>
<!-- /WRAPPER ALL -->
@endsection
