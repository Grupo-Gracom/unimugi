 <!-- HEADER -->
 <header class="">
    <div class="perfil">
        <div class="infos">
            <h6 class="barlow">{{ Auth::user()->name }}</h6>
            <figure>
                <img src="{{asset('assets/img/dashboard/user.jpg')}}" alt="">
            </figure>
        </div>
        <ul class="box suave">
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mini-title">Sair</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </li>
        </ul>
    </div>
</header>
<!-- /HEADER -->