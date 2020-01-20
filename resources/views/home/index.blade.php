@extends('layouts.template')
@section('titulo','UNIMUGI | Home')
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
							<div class="title_holder">
								<h3>Bem Vindo ao seu Portal</h3>
								<span>utilize o menu ao lado para navegar</span>
							</div>
							<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="{{asset('assets/img/slide/1.jpg')}}" alt="First slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="{{asset('assets/img/slide/2.jpg')}}" alt="Second slide">
									</div>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
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
