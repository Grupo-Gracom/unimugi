@extends('layouts.template')
@section('titulo','UNIMUGI | Staff Franquias')
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
									<h3>Staff Franquias</h3>
								</div>
								<div class="row">
									@foreach($conteudos as $conteudo)
										<div class="active__single col-md-6">
											<div class="img_holder">
												<img src="{{asset('assets/img/dashboard/active-1.jpg')}}" alt="">
											</div>
											<div class="content">
												<p><a class="name item-list" href="#">{{$conteudo->titulo_topico}}</a> </p>
												<p>{{$conteudo->created_at}} </p>
											</div>
										</div>
									@endforeach
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
