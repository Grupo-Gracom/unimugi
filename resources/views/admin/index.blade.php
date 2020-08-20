@extends('layouts.template')
@section('titulo','UNIMUGI | Admin')
@section('conteudo')
<!-- WRAPPER ALL -->

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
						<i class="material-icons">chat</i>
						<h1 class="barlow">{{ $noticias }}</h1>
						<h6 class="barlow">Notícias</h6>
					</li>
					<li>
						<i class="material-icons">folder</i>
						<h1 class="barlow">{{ $categorias }}</h1>
						<h6 class="barlow">Categorias</h6>
					</li>
					<li>
						<i class="material-icons">folder</i>
						<h1 class="barlow">{{ $topicos }}</h1>
						<h6 class="barlow">Tópicos</h6>
					</li>
					<li>
						<i class="material-icons">insert_drive_file</i>
						<h1 class="barlow">{{ $conteudos }}</h1>
						<h6 class="barlow">Conteúdos</h6>
					</li>
					<li>
						<i class="material-icons">account_circle</i>
						<h1 class="barlow">{{ $usuarios }}</h1>
						<h6 class="barlow">Usuários</h6>
					</li>
					<!-- <li>
						<i class="material-icons">flag</i>
						<h1 class="barlow">0</h1>
						<h6 class="barlow">Campanhas</h6>
					</li> -->
				</ul>
			</div>
			<div id="MaisAcessados" class="box">
				<h3 class="barlow" style="text-transform: none;">Conteúdos mais acessados</h3>
				<p>Conteúdos com melhores desempenhos.</p>
				<ul>
					<li><h6 class="barlow">Conteúdo</h6><span class="barlow">Acessos</span></li>
					@foreach($conteudosMaisAcessados as $conteudo)
					<li><h6>{{ $conteudo->conteudo_titulo }}</h6><span>{{ $conteudo->conteudo_views }}</span></li>
					@endforeach
				</ul>
			</div>
			<div id="MaisAcessados" class="box direita">
				<h3 class="barlow" style="text-transform: none;">Conteúdos menos acessados</h3>
				<p>Conteúdos com os piores desempenhos.</p>
				<ul>
					<li><h6 class="barlow">Conteúdo</h6><span class="barlow">Acessos</span></li>
					@foreach($conteudosMenosAcessados as $conteudo)
					<li><h6>{{ $conteudo->conteudo_titulo }}</h6><span>{{ $conteudo->conteudo_views }}</span></li>
					@endforeach
				</ul>
			</div>
		</div>
		
		<!-- Últimas notícias -->
		@include('layouts.noticias.noticias')

	</main>
@endsection
