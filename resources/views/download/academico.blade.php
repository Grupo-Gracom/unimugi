@extends('layouts.template')
@section('titulo','UNIMUGI | Material Acadêmico')
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
    		<!-- <div class="dashboard_bg">
    			<div class="overlay_color"></div>
    			<div class="overlay_image jarallax" data-speed="0.2"></div>
    		</div> -->
    		<!-- /DASHBOARD BACKGROUND -->

    		<!-- DASHBOARD CONTENT -->
    		<!-- <div class="container"> -->
    			<div class="dashboard_content">

					<div class="dashboard_wrap sticky_sidebar">

						<div class="dashboard">
							<div class="listings__active">
								<div class="title_holder">
									<h3>Material Acadêmico</h3>
								</div>
								<div class="row">
									<div class="col-md-6">
                    @foreach ($materiais as $material)
                  <a href="{{$material->path}}"><img src="{{asset('assets/img/dashboard/active-1.jpg')}}" alt=""></a>
                     <div class="col-6">
                          <div class="col-md-12">
                       <h5>{{$material->title}}</h5>
                        </div>
                       </div>
                     @endforeach
									</div>
								</div>
							</div>
						</div>
					</div>

    			</div>
    		<!-- </div> -->
    		<!-- DASHBOARD CONTENT -->

    	</div>
    	<!-- /DASHBOARD -->

    </div>

</div>
<!-- /WRAPPER ALL -->
@endsection
