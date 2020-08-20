<!-- DASHBOARD MENU -->
<nav class="suave">
    @if(Auth::user()->nivel == 1)
        <div class="logo">
            <a href="{{route('admin')}}">
                <figure>
                    <img src="{{asset('assets/img/logo-imugi.png')}}" alt="">
                </figure>
            </a>
        </div>
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
            <li>
                <a href="{{route('noticias.index')}}" class="@if(Route::current()->getName() == 'noticias.index') active-item @endif item">
                    <i class="material-icons">chat</i>Notícias
                </a>
            </li>
            <li>
                <a href="{{route('cadastro-material')}}" class="@if(Route::current()->getName() == 'cadastro-material') active-item @endif item">
                    <i class="material-icons">chat</i>Material
                </a>
            </li>
            <li>
                <a href="{{route('usuarios.index')}}" class="@if(Route::current()->getName() == 'usuarios.index') active-item @endif item">
                    <i class="material-icons">account_circle</i>Usuários
                </a>
            </li>
            <li class="label"></li>
            <li>
                <a href="{{ route('home') }}" class="@if(Route::current()->getName() == 'home') active-item @endif item">
                    <i class="material-icons">home</i> Início colaborador
                </a>
            </li>
            <li>
                <a href="operacional" class="@if(Route::current()->getName() == 'operacional') active-item @endif item">
                    <i class="material-icons">folder</i> Operacional
                </a>
            </li>
            <li>
                <a href="marketing" class="@if(Route::current()->getName() == 'marketing') active-item @endif item">
                    <i class="material-icons">folder</i> Marketing / Gracom +
                </a>
            </li>
            <li>
                <a href="treinamentos" class="@if(Route::current()->getName() == 'treinamentos') active-item @endif item">
                    <i class="material-icons">folder</i> Treinamentos
                </a>
            </li>
            <li>
                <a href="modelos-de-solicitacoes" class="@if(Route::current()->getName() == 'modelos-de-solicitacoes') active-item @endif item">
                    <i class="material-icons">folder</i> Modelos de Solicitações
                </a>
            </li>
            <li>
                <a href="manuais-e-regulamentos" class="@if(Route::current()->getName() == 'manuais-e-regulamentos') active-item @endif item">
                    <i class="material-icons">folder</i> Manuais e Regulamentos
                </a>
            </li>
            <li>
                <a href="pedagogico" class="@if(Route::current()->getName() == 'pedagogico') active-item @endif item">
                    <i class="material-icons">folder</i> Pedagógico
                </a>
            </li>
            <li>
                <a href="material" class="@if(Route::current()->getName() == 'material') active-item @endif item">
                    <i class="material-icons">folder</i> Material Download
                </a>
            </li>
        </ul>
    @else
        <div class="logo">
            <a href="{{route('home')}}">
                <figure>
                    <img src="{{asset('assets/img/logo-imugi.png')}}" alt="">
                </figure>
            </a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('home') }}" class="@if(Route::current()->getName() == 'home') active-item @endif item">
                    <i class="material-icons">home</i> Início
                </a>
            </li>
            <li>
                <a href="operacional" class="@if(Route::current()->getName() == 'operacional') active-item @endif item">
                    <i class="material-icons">folder</i> Operacional
                </a>
            </li>
            <li>
                <a href="marketing" class="@if(Route::current()->getName() == 'marketing') active-item @endif item">
                    <i class="material-icons">folder</i> Marketing / Gracom +
                </a>
            </li>
            <li>
                <a href="treinamentos" class="@if(Route::current()->getName() == 'treinamentos') active-item @endif item">
                    <i class="material-icons">folder</i> Treinamentos
                </a>
            </li>
            <li>
                <a href="modelos-de-solicitacoes" class="@if(Route::current()->getName() == 'modelos-de-solicitacoes') active-item @endif item">
                    <i class="material-icons">folder</i> Modelos de Solicitações
                </a>
            </li>
            <li>
                <a href="manuais-e-regulamentos" class="@if(Route::current()->getName() == 'manuais-e-regulamentos') active-item @endif item">
                    <i class="material-icons">folder</i> Manuais e Regulamentos
                </a>
            </li>
            <li>
                <a href="pedagogico" class="@if(Route::current()->getName() == 'pedagogico') active-item @endif item">
                    <i class="material-icons">folder</i> Pedagógico
                </a>
            </li>
            <li>
                <a href="material" class="@if(Route::current()->getName() == 'material') active-item @endif item">
                    <i class="material-icons">folder</i> Material Download
                </a>
            </li>
            <li class="label"></li>
            <li>
                <a href="http://lojaunigracom1.com.br/" class="item" target="_blank">
                    <i class="material-icons">store</i> E-Commerce
                </a>
            </li>
            <li>
                <a href="http://imugi.com.br/acesso/" class="item" target="_blank">
                    <i class="material-icons">account_circle</i> Portal do Aluno (ADM)
                </a>
            </li>
            <li>
                <a href="http://webmail.imugi.com.br/" class="item" target="_blank">
                    <i class="material-icons">mail</i> Webmail
                </a>
            </li>
        </ul>
    @endif
</nav>
<!-- /DASHBOARD MENU -->