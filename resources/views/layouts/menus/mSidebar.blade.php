<!-- DASHBOARD MENU -->
<nav class="">
    <div class="logo">
        <a href="index.html">
            <figure>
                <img src="{{asset('assets/img/logo-imugi.png')}}" alt="">
            </figure>
        </a>
    </div>
    @if(Auth::user()->nivel == 1)
        <ul class="nav">
            <li>
                <a href="{{route('admin')}}" class="@if(Route::current()->getName() == 'admin') active-item @endif item">
                    <i class="material-icons">home</i>Início
                </a>
            </li>
            <li>
                <a href="{{route('categorias.index')}}" class="@if(Route::current()->getName() == 'categorias.index') active-item @endif item">
                    <i class="material-icons">list</i>Categorias
                </a>
            </li>
            <li>
                <a href="{{route('topicos.index')}}" class="@if(Route::current()->getName() == 'topicos.index') active-item @endif item">
                    <i class="material-icons">list</i>Tópicos
                </a>
            </li>
            <li>
                <a href="{{route('conteudos.index')}}" class="@if(Route::current()->getName() == 'conteudos.index') active-item @endif item">
                    <i class="material-icons">list</i>Conteúdos
                </a>
            </li>
        </ul>
    @else
        <ul class="nav">
            <li><a href="{{ route('home') }}" class="@if(Route::current()->getName() == 'home') active-item @endif item"> Início</a></li>
            <li><a href="operacional" class="@if(Route::current()->getName() == 'operacional') active-item @endif item">Operacional</a></li>
            <li><a href="marketing" class="@if(Route::current()->getName() == 'marketing') active-item @endif item">Marketing / Gracom +</a></li>
            <li><a href="treinamentos" class="@if(Route::current()->getName() == 'treinamentos') active-item @endif item">Treinamentos</a></li>
            <li><a href="modelos-de-solicitacoes" class="@if(Route::current()->getName() == 'modelos-de-solicitacoes') active-item @endif item">Modelos de Solicitações</a></li>
            <li><a href="staff-franquias" class="@if(Route::current()->getName() == 'staff-franquias') active-item @endif item">Manuais e Regulamentos</a></li>
            <li class="label"></li>
            <li><a href="http://lojaunigracom1.com.br/" class="item" target="_blank">E-Commerce</a></li>
            <li><a href="http://imugi.com.br/acesso/" class="item" target="_blank">Portal do Aluno (ADM)</a></li>
            <li><a href="http://webmail.imugi.com.br/" class="item" target="_blank">Webmail</a></li>
        </ul>
    @endif
</nav>
<!-- /DASHBOARD MENU -->
					