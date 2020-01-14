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
							<div class="recent_actions">
								<div class="title_holder">
									<span>Atividades Recentes (Upload) </span>
								</div>
								<div class="action__single">
									<div class="icon">
										<img class="svg" src="img\svg\layers.svg" alt="">
									</div>
									<div class="content">
										<p>
											<span class="title"><a href="#">The Lombardy</a></span>
											<span class="text">— Your new submission has been approved</span>
										</p>
										<span class="time_duration">2 Days Ago</span>
									</div>
								</div>
								<div class="action__single">
									<div class="icon">
										<img class="svg" src="img\svg\favorite.svg" alt="">
									</div>
									<div class="content">
										<p>
											<span class="text">John Doe left a review</span>
											<span class="rating">5.0</span>
											<span class="text">on</span>
											<span class="title"><a href="#">Butcher Bar</a></span>
										</p>
										<span class="time_duration">4 Days Ago</span>
									</div>
								</div>
								<div class="action__single">
									<div class="icon">
										<img class="svg big" src="img\svg\bookmark.svg" alt="">
									</div>
									<div class="content">
										<p>
											<span class="text">Anna Alieva bookmarked your</span>
											<span class="title"><a href="#">Mahattan Walking Tour</a></span>
										</p>
										<span class="time_duration">7 Days Ago</span>
									</div>
								</div>
								<div class="action__single">
									<div class="icon">
										<img class="svg" src="img\svg\layers.svg" alt="">
									</div>
									<div class="content">
										<p>
											<span class="title"><a href="#">Manhattan Walking Tour</a></span>
											<span class="text">— Your new submission has been approved</span>
										</p>
										<span class="time_duration">14 Days Ago</span>
									</div>
								</div>
								<div class="action__single">
									<div class="icon">
										<img class="svg" src="img\svg\favorite.svg" alt="">
									</div>
									<div class="content">
										<p>
											<span class="text">John Doe left a review</span>
											<span class="rating">4.0</span>
											<span class="text">on</span>
											<span class="title"><a href="#">Honey Badger</a></span>
										</p>
										<span class="time_duration">20 Days Ago</span>
									</div>
								</div>
								<div class="action__single">
									<div class="icon">
										<img class="svg big" src="img\svg\bookmark.svg" alt="">
									</div>
									<div class="content">
										<p>
											<span class="text">Anna Alieva bookmarked your</span>
											<span class="title"><a href="#">Brooklyn Bridge Park</a></span>
										</p>
										<span class="time_duration">22 Days Ago</span>
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
