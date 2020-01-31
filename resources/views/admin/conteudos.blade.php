@extends('layouts.template')
@section('titulo','UNIMUGI | Conteudos')
@section('conteudo')
<!-- WRAPPER ALL -->

	@include('layouts.menus.mobile')
    @include('layouts.menus.mSidebar')
    @include('layouts.header.mHeader')
    
    <main>
        <!-- Conteúdo principal central -->
        <div class="dashboard">
            <div id="conteudos" class="box">
                <h3 class="barlow">
                    Conteúdos
                    <button class="click suave novo-conteudo"><i class="material-icons">add</i><span class="mini-title">Novo Conteúdo<span></button>
                </h3>
                <div id="conteudos-list">
                    <ul class="list-head">
                        <li>
                            <div><h6 class="mini-title">#</h6></div>
                            <div><h6 class="mini-title">Título</h6></div>
                            <div><h6 class="mini-title">Tópico</h6></div>
                            <div><h6 class="mini-title">Criado em</h6></div>
                            <div><h6 class="mini-title">Visível?</h6></div>
                            <div><h6 class="mini-title">Ações</h6></div>
                        </li>
                    </ul>
                    <ul class="list-body">
                        @foreach($conteudos as $conteudo)
                            <li>
                                <div><h6>{{ $conteudo->conteudo_id }}</h6></div>
                                <div><h6>{{ $conteudo->conteudo_titulo }}</h6></div>
                                <div>
                                    <h6>
                                    @foreach($topicos as $topico)
                                        @if($conteudo->topico_id == $topico->topico_id)
                                            {{ $topico->topico_titulo }}
                                        @endif
                                    @endforeach
                                    </h6>
                                </div>
                                <div>
                                    <h6>
                                        <?php
                                            $data = new DateTime($conteudo->conteudo_data);
                                            $criadoEm = $data->format("d/m/Y");
                                            echo $criadoEm;
                                        ?>
                                    </h6>
                                </div>
                                <div>
                                    <h6>
                                        @if($conteudo->conteudo_status == 1)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </h6>
                                </div>
                                <div>
                                    <i class="material-icons click ver-conteudo" data-id="{{ $conteudo->conteudo_id }}">visibility</i>
                                    <i class="material-icons click editar-conteudo" data-id="{{ $conteudo->conteudo_id }}">create</i>
                                    <form id="delete{{ $conteudo->conteudo_id }}" action="" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">                                  
                                        <input type="hidden" name="d_conteudo_id" value="{{ $conteudo->conteudo_id }}">
                                        <button type="submit" class="click"><i class="material-icons deletar-conteudo" data-form="delete{{ $conteudo->conteudo_id }}">delete</i></button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <!-- <ul class="list-foot">
                        <li>
                            <div>
                                <h6>
                                    <i class="material-icons click">keyboard_arrow_left</i>
                                    1 de 10
                                    <i class="material-icons click">keyboard_arrow_right</i>
                                </h6>
                            </div>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </main>
        
    <!-- LATERAL CONTENT -->
    <div id="lateral" class="suave">
        <div class="overlay suave"></div>
        <div id="ver-conteudo" class="content suave">
            <h4 class="barlow">Ver conteúdo <i class="material-icons click fechar">close</i></h4>
            <div class="conteudo">
                <h1 class="conteudo_titulo"></h1>
                <p class="conteudo_datas">Criado em <b class="conteudo_data"></b><br> Atualizado em <b class="conteudo_data_up"></b></p>
                <div class="conteudo_descricao box"></div>
            </div>
        </div>
        <div id="novo-conteudo" class="content suave">
            <h4 class="barlow">Novo conteúdo <i class="material-icons click fechar">close</i></h4>
            <form id="form-novo-conteudo" action="{{ route('conteudos.store') }}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <label for="conteudo-titulo">Título</label>
                <input type="text" name="conteudo_titulo" id="conteudo_titulo" placeholder="Título do tópico" required>
                <label for="conteudo_descricao">Descrição</label>
                <textarea name="conteudo_descricao" id="conteudo_descricao" class="editor"></textarea>
                <label for="topico_id" style="margin-top: 16px;">Pertence ao tópico:</label>
                <select name="topico_id" id="topico_id">
                    @foreach($topicos as $topico)
                        <option value="{{ $topico->topico_id }}">{{ $topico->topico_titulo }}</option>
                    @endforeach
                </select>
                <div class="clear"></div>
                <button type="submit">Confirmar</button>
            </form>
        </div>
        <div id="editar-conteudo" class="content suave">
            <h4 class="barlow">Editar conteúdo <i class="material-icons click fechar">close</i></h4>
            <form id="form-editar-conteudo" action="{{ route('conteudos.store') }}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="e_conteudo_id" value="">
                <label for="e_conteudo_titulo">Título</label>
                <input type="text" name="e_conteudo_titulo" id="e_conteudo_titulo" placeholder="Título do tópico" required>
                <label for="e_conteudo_descricao">Descrição</label>
                <textarea name="e_conteudo_descricao" id="e_conteudo_descricao" class="editor"></textarea>
                <label for="e_topico_id" style="margin-top: 16px;">Pertence ao tópico:</label>
                <select name="e_topico_id" id="e_topico_id">
                    @foreach($topicos as $topico)
                        <option value="{{ $topico->topico_id }}">{{ $topico->topico_titulo }}</option>
                    @endforeach
                </select>
                <div class="clear"></div>
                <button type="submit">Confirmar</button>
            </form>
        </div>
    </div>

    <!-- ALERTA -->
    <div id="alerta" class="suave">
        <div class="overlay suave"></div>
        <div class="alerta box suave">
            <p>Deseja realmente apagar este item?</p>
            <div class="nao click mini-title"><i class="material-icons">thumb_down</i>Não</div>
            <div class="sim click mini-title"><i class="material-icons">thumb_up</i>Sim</div>
        </div>
    </div>

<script>
    $(".novo-conteudo").click(function(){
        $("#lateral, #novo-conteudo").addClass("active");
        $("#form-novo-conteudo").submit(function(e){
            e.preventDefault();
            $(this).find('button').prop('disabled', true);
            criarConteudo();
        });
    });

    $(document).on("click", ".ver-conteudo", function(){
        $("#lateral, #ver-conteudo").addClass("active");
        conteudo($(this).attr("data-id"), 1);
    });

    var editar = "";
    $(document).on("click", ".editar-conteudo", function(){
        $("#lateral, #editar-conteudo").addClass("active");
        var conteudo_id = $(this).attr("data-id");
        editar = conteudo_id;
        conteudo(conteudo_id, 2);
    });

    $("#form-editar-conteudo").submit(function(e){
        e.preventDefault();
        $(this).find('button').prop('disabled', true);
        editarConteudo(editar);
    });

    $(document).on("click", ".deletar-conteudo", function(){
        var form = $(this).attr("data-form");
        $("#alerta").addClass("active");
        $('#'+form).submit(function(e){
            e.preventDefault();
            $("#alerta .sim").click(function(){
                deletaConteudo(form);
            });
        });
    });

    function conteudo(conteudo_id, operacao){
        request = $.ajax({
            url: 'conteudos/'+conteudo_id,
            type: 'get',
            error: function(){
                //criaAlerta(0,"Falha ao deletar categoria!!",2000);
                console.log("deu pal");
            }
        });
        request.done(function(response){
            if(operacao == 2){
                $('#form-editar-conteudo input[name="e_conteudo_titulo"]').val(response.conteudo_titulo);
                CKEDITOR.instances.e_conteudo_descricao.setData(response.conteudo_descricao);
            }else if(operacao == 1){
                $("#ver-conteudo .conteudo_titulo").text(response.conteudo_titulo);
                $("#ver-conteudo .conteudo_descricao").html(response.conteudo_descricao);
                var data = response.conteudo_data.split(' ');
                var datasplit = data[0].split('-');
                $("#ver-conteudo .conteudo_data").text(datasplit[2]+'/'+datasplit[1]+'/'+datasplit[0]+' às '+data[1]);
                var dataup = response.conteudo_data_up.split(' ');
                var datasplitup = dataup[0].split('-');
                $("#ver-conteudo .conteudo_data_up").text(datasplit[2]+'/'+datasplit[1]+'/'+datasplit[0]+' às '+data[1]);
            }
        });
    }

    function criarConteudo(){
        var conteudo = {
            "_token" : $('#form-novo-conteudo input[name="_token"]').val(),
            "conteudo_titulo" : $('#form-novo-conteudo input[name="conteudo_titulo"]').val(),
            "conteudo_descricao" : $('#form-novo-conteudo textarea[name="conteudo_descricao"]').val(),
            "topico_id" : $('#form-novo-conteudo select option:selected').val()
        };
        request = $.ajax({
            url: 'conteudos',
            data: conteudo,
            type: 'post',
            error: function(){
                //criaAlerta(0,"Falha ao deletar categoria!!",2000);
                console.log("deu pal");
            }
        });
        request.done(function(response){
            if(response == "1"){
                $("#lateral, #lateral .content").removeClass("active");
                window.location.reload();
            }
        });
    }

    function editarConteudo(conteudo_id){
        var conteudo = {
            "_token" : $('#form-editar-conteudo input[name="_token"]').val(),
            "e_conteudo_id" : conteudo_id,
            "e_conteudo_titulo" : $('#form-editar-conteudo input[name="e_conteudo_titulo"]').val(),
            "e_conteudo_descricao" : CKEDITOR.instances.e_conteudo_descricao.getData(),
            "e_topico_id" : $('#form-editar-conteudo select option:selected').val()
        };
        request = $.ajax({
            url: 'conteudos',
            data: conteudo,
            type: 'post',
            error: function(){
                //criaAlerta(0,"Falha ao deletar categoria!!",2000);
                console.log("deu pal");
            }
        });
        request.done(function(response){
            if(response == "2"){
                $("#lateral, #lateral .content").removeClass("active");
                window.location.reload();
            }
        });
    }

    function deletaConteudo(form){
        var conteudo = {
            "_token" : $('#'+form+' input[name="_token"]').val(),
            "conteudo_id" : $('#'+form+' input[name="d_conteudo_id"]').val()
        };
        request = $.ajax({
            url: 'conteudos/'+conteudo.conteudo_id,
            data: conteudo,
            type: 'delete',
            error: function(){
                //criaAlerta(0,"Falha ao deletar categoria!!",2000);
                console.log("deu pal");
            }
        });
        request.done(function(response){
            if(response == "1"){
                $("#alerta").removeClass("active");
                window.location.reload();
            }
        });
    }
    
    $("#lateral .fechar, #lateral .overlay").click(function(){
        $("#lateral, #lateral .content").removeClass("active");
    });

    $("#alerta .nao").click(function(){
        $("#form-editar-conteudo")[0].reset();
        $("#alerta").removeClass("active");
    });

    CKEDITOR.replace( 'conteudo_descricao', {
        height: 500
        // filebrowserUploadUrl: "componentes/posts_blog/control/postCreate.php?ACAO=SALVAR_IMAGEM"
    });
    CKEDITOR.replace( 'e_conteudo_descricao', {
        height: 500
        //filebrowserUploadUrl: "componentes/posts_blog/control/postCreate.php?ACAO=SALVAR_IMAGEM"
    });

</script>
@endsection