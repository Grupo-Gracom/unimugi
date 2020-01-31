<!-- DASHBOARD MENU -->
<div class="menu_wrap sticky_sidebar">
	<div class="menu">
		
		<div class="header">
			<div class="prof_who">
				<div class="img_holder">
					<img src="{{asset('assets/img/dashboard/user.jpg')}}" alt="">
				</div>
				<div class="title_holder">
					<div>
						<span>Olá!</span>
						<h3>{{ Auth::user()->name }}</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="content">
			@if(Auth::user()->nivel == 1)
				<ul class="nav">
					<li><a href="{{route('admin')}}" class="@if(Route::current()->getName() == 'admin') active-item @endif item"> Início</a></li>
					<li><a href="{{route('categorias')}}" class="@if(Route::current()->getName() == 'categorias') active-item @endif item"> Categorias</a></li>
					
				</ul>
			@else
				<ul class="nav">
					<li><a href="{{route('home')}}" class="@if(Route::current()->getName() == 'home') active-item @endif item"> Início</a></li>
					<li class="label">Categorias</li>
					<li><a href="{{route('operacional')}}" class="@if(Route::current()->getName() == 'operacional') active-item @endif item">Operacional</a></li>
					<li><a href="{{route('marketing')}}" class="@if(Route::current()->getName() == 'marketing') active-item @endif item">Marketing / Gracom +</a></li>
					<li><a href="{{route('treinamentos')}}" class="@if(Route::current()->getName() == 'treinamentos') active-item @endif item">Treinamentos</a></li>
					<li><a href="{{route('modelos-de-solicitacoes')}}" class="@if(Route::current()->getName() == 'modelos-de-solicitacoes') active-item @endif item">Modelos de Solicitações</a></li>
					<li><a href="{{route('staff-franquias')}}" class="@if(Route::current()->getName() == 'staff-franquias') active-item @endif item">Manuais e Regulamentos</a></li>
					<li class="label">Atalhos</li>
					<li><a href="http://lojaunigracom1.com.br/" class="item" target="_blank">E-Commerce</a></li>
					<li><a href="http://imugi.com.br/acesso/" class="item" target="_blank">Portal do Aluno (ADM)</a></li>
					<li><a href="http://webmail.imugi.com.br/" class="item" target="_blank">Webmail</a></li>
				</ul>
			@endif
		</div>
	</div>
</div>
<!-- /DASHBOARD MENU -->
					