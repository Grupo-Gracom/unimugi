<!-- DASHBOARD HIDDEN LIST -->
<div class="hidden_list">
							<div class="hidden_list_inner">
								<div class="prof_img">
									<img src="{{asset('assets/img/dashboard/user.jpg')}}" alt="">
								</div>
								<div class="prof_name">
									<div>
										<h6>Olá!</h6>
										<h3>{{ Auth::user()->name }}</h3>
									</div>
								</div>
								<div class="hamburger hamburger--spin">
									<div class="hamburger-box">
										<div class="hamburger-inner"></div>
									</div>
								</div>
							</div>
							<div class="hidden_list_nav">
								<ul class="nav">
									<li><a href="{{route('home')}}l">Home</a></li>
									<li class="label">Categorias</li>
									<li><a href="{{route('operacional')}}">Operacional</a></li>
									<li><a href="{{route('marketing')}}">Marketing / Gracom +</a></li>
									<li><a href="{{route('treinamentos')}}">Treinamentos</a></li>
									<li><a href="{{route('modelos-de-solicitacoes')}}">Modelos de Solicitações</a></li>
									<li><a href="{{route('staff-franquias')}}">Manuais e Regulamentos</a></li>
                                    <li class="label">Atalhos</li>
                                    <li><a href="http://lojaunigracom1.com.br/" target="_blank">E-Commerce</a></li>
                                    <li><a href="http://imugi.com.br/acesso/" target="_blank">Portal do Aluno (ADM)</a></li>
                                    <li><a href="http://webmail.imugi.com.br/" target="_blank">Webmail</a></li>
								</ul>
							</div>
						</div>
						<!-- /DASHBOARD HIDDEN LIST -->