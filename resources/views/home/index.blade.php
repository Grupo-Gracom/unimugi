@extends('layouts.template')
@section('titulo','UNIMUGI | Home')
@section('conteudo')
<!-- WRAPPER ALL -->

	@include('layouts.menus.mobile')
	@include('layouts.menus.mSidebar')
    @include('layouts.header.mHeader')
    		
	<main>
		<!-- Conteúdo principal central -->
		<div class="dashboard">
			<div id="" class="box">
				<h3 class="barlow">Bem vindo a Unimugi</h3>
				<p>Utilize o menu ao lado para navegar.</p>
			</div>
			<!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
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
			</div> -->
		</div>
		
		<!-- Últimas notícias -->
		@include('layouts.noticias.noticias')

	</main>

@endsection
