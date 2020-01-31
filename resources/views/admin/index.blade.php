@extends('layouts.template')
@section('titulo','UNIMUGI | Admin')
@section('conteudo')
<!-- WRAPPER ALL -->

	@include('layouts.menus.mobile')
	@include('layouts.menus.mSidebar')
	@include('layouts.header.mHeader')
	
	<main>
		<!-- Conteúdo principal central -->
		<div class="dashboard">
			<div id="estatisticas" class="box">
				<h3 class="barlow">Estatísticas</h3>
				<p>Acompanhe os dados da plataforma.</p>
				<ul class="resumos">
					<li>
						<h6 class="barlow">Notícias</h6>
						<h1 class="barlow">0</h1>
					</li>
					<li>
						<h6 class="barlow">Categorias</h6>
						<h1 class="barlow">{{ $categorias }}</h1>
					</li>
					<li>
						<h6 class="barlow">Tópicos</h6>
						<h1 class="barlow">{{ $topicos }}</h1>
					</li>
					<li>
						<h6 class="barlow">Conteúdos</h6>
						<h1 class="barlow">{{ $conteudos }}</h1>
					</li>
					<li>
						<h6 class="barlow">Usuários</h6>
						<h1 class="barlow">{{ $usuarios }}</h1>
					</li>
					<li>
						<h6 class="barlow">Campanhas</h6>
						<h1 class="barlow">0</h1>
					</li>
				</ul>
			</div>
		</div>
		
		<!-- Últimas notícias -->
		@include('layouts.noticias.noticias')

	</main>
@endsection
