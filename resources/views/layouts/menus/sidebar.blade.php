
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
								<ul class="nav">
									<li><a href="{{route('home')}}"> Home</a></li>
									<li class="label">Canais</li>
									<li><a href="{{route('operacional')}}">Operacional</a></li>
									<li><a href="{{route('marketing')}}">Marketing / Gracom +</a></li>
									<li><a href="{{route('treinamentos')}}">Treinamentos</a></li>
									<li><a href="{{route('modelos-de-solicitacoes')}}">Modelos de Solicitações</a></li>
									<li><a href="{{route('staff-franquias')}}">Manuais e Regulamentos</a></li>
                                    <li class="label">Opções</li>
                                    <li><a href="http://lojaunigracom1.com.br/" target="_blank">E-Commerce</a></li>
                                    <li><a href="http://imugi.com.br/acesso/" target="_blank">Portal do Aluno (ADM)</a></li>
                                    <li><a href="http://webmail.imugi.com.br/" target="_blank">Webmail</a></li>
                                </ul>
							</div>
						</div>
					</div>
					<!-- /DASHBOARD MENU -->
					