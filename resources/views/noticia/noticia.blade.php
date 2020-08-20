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
				<h3 class="barlow">{{ $noticia->noticia_titulo }}</h3>
				<?php echo $noticia->noticia_descricao; ?>
			</div>
		</div>

	</main>

@endsection
