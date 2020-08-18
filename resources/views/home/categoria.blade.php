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
			<div id="categoria" class="box">
				<h3 class="barlow">{{ Route::current()->getName() }}</h3>
				<p>Tópicos desta categoria</p>
                <ul class="lista">
                    @foreach($topicos as $topico)
                    <li class="lista-head box" data-topico="{{ $topico->topico_titulo }}">
                        <div class="click"><h6 class="mini-title">{{ $topico->topico_titulo }}</h6><i class="material-icons">keyboard_arrow_down</i></div>
                        <ul>
                            @foreach($conteudos as $conteudo)
                                @if($conteudo->topico_id == $topico->topico_id)
                                <li class="suave click ver-conteudo" data-id="{{ $conteudo->conteudo_id }}"><div><h6>{{ $conteudo->conteudo_titulo }}</h6></div></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
			</div>
		</div>

    </main>

    <!-- LATERAL CONTENT -->
    <div id="lateral" class="suave">
        <div class="overlay suave"></div>
        <div id="ver-conteudo" class="content suave">
            <h4 class="barlow"><i class="material-icons click fechar">close</i></h4>
            <div class="conteudo">
                <h1 class="conteudo_titulo" style="margin-bottom: 0;">Titulo</h1>
                <h4 class="conteudo_topico"></h4>
                <p class="conteudo_datas">Criado em <b class="conteudo_data"></b><br> Atualizado em <b class="conteudo_data_up"></b></p>
                <div class="conteudo_descricao box"></div>
                <div class="imprimir click"><i class="material-icons">print</i></div>
            </div>
        </div>
    </div>
    
    <script>
        var titulo = $("#categoria h3").text();
        titulo = titulo.replace(/-/g, " ");
        $("#categoria h3").text(titulo);

        $(document).on("click", ".lista-head", function(){
            $(".lista ul").removeClass("active");
            $(this).find('ul').addClass("active");
            $("#ver-conteudo .conteudo_topico").text($(this).attr("data-topico"));
        });

        $(document).on("click", ".ver-conteudo", function(){
            $("#lateral, #ver-conteudo").addClass("active");
            conteudo($(this).attr("data-id"));
        });

        function conteudo(conteudo_id){
            request = $.ajax({
                url: 'conteudos/'+conteudo_id,
                type: 'get',
                error: function(){
                    //criaAlerta(0,"Falha ao deletar categoria!!",2000);
                    console.log("deu pal");
                }
            });
            request.done(function(response){
                $("#ver-conteudo .conteudo_titulo").text(response.conteudo_titulo);
                $("#ver-conteudo .conteudo_descricao").html(response.conteudo_descricao);
                var data = response.conteudo_data.split(' ');
                var datasplit = data[0].split('-');
                $("#ver-conteudo .conteudo_data").text(datasplit[2]+'/'+datasplit[1]+'/'+datasplit[0]);
                var dataup = response.conteudo_data_up.split(' ');
                var datasplitup = dataup[0].split('-');
                $("#ver-conteudo .conteudo_data_up").text(datasplit[2]+'/'+datasplit[1]+'/'+datasplit[0]);
            });
        }

        $("#lateral .fechar, #lateral .overlay").click(function(){
            $("#lateral, #lateral .content").removeClass("active");
        });
    </script>

@endsection
