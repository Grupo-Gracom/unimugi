@extends('layouts.template')
@section('titulo','UNIMUGI | Conteudos')
@section('conteudo')
<!-- WRAPPER ALL -->

    @include('layouts.menus.mSidebar')
    @include('layouts.header.mHeader')
    
    <main>
        <!-- Conteúdo principal central -->
        <div class="dashboard">
            <div id="noticias" class="box">
                <h3 class="barlow">
                    Notícias
                    <button class="click suave nova-noticia"><i class="material-icons">add_circle</i><span class="mini-title">Nova notícia<span></button>
                </h3>
                <div id="noticias-list">
                    <ul class="list-head">
                        <li>
                            <div><h6 class="mini-title">#</h6></div>
                            <div><h6 class="mini-title">Título</h6></div>
                            <div><h6 class="mini-title">Criado em</h6></div>
                            <div><h6 class="mini-title">Views</h6></div>
                            <div><h6 class="mini-title">Visível?</h6></div>
                            <div><h6 class="mini-title">Ações</h6></div>
                        </li>
                    </ul>
                    <ul class="list-body">
                        @foreach($noticias as $noticia)
                            <li>
                                <div><h6>{{ $noticia->noticia_id }}</h6></div>
                                <div><h6>{{ $noticia->noticia_titulo }}</h6></div>
                                <div>
                                    <h6>
                                        <?php
                                            $data = new DateTime($noticia->noticia_data);
                                            $criadoEm = $data->format("d/m/Y");
                                            echo $criadoEm;
                                        ?>
                                    </h6>
                                </div>
                                <div><h6>{{ $noticia->noticia_views }}</h6></div>
                                <div>
                                    <h6>
                                        @if($noticia->noticia_status == 1)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </h6>
                                </div>
                                <div>
                                    <i class="material-icons click ver-noticia" data-id="{{ $noticia->noticia_id }}">visibility</i>
                                    <i class="material-icons click editar-noticia" data-id="{{ $noticia->noticia_id }}">create</i>
                                    <form id="delete{{ $noticia->noticia_id }}" action="" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">                                  
                                        <input type="hidden" name="d_noticia_id" value="{{ $noticia->noticia_id }}">
                                        <button type="submit" class="click"><i class="material-icons deletar-noticia" data-form="delete{{ $noticia->noticia_id }}">delete</i></button>
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
        <div id="ver-noticia" class="content suave">
            <h4 class="barlow"><i class="material-icons click fechar">close</i></h4>
            <div class="conteudo">
                <h1 class="noticia_titulo"></h1>
                <p class="noticia_datas">Criado em <b class="noticia_data"></b><br> Atualizado em <b class="noticia_data_up"></b></p>
                <div class="noticia_descricao box"></div>
            </div>
        </div>
        <div id="nova-noticia" class="content suave">
            <h4 class="barlow">Nova notícia <i class="material-icons click fechar">close</i></h4>
            <form id="form-nova-noticia" action="{{ route('noticias.store') }}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <label for="noticia_titulo">Título</label>
                <input type="text" name="noticia_titulo" id="noticia_titulo" placeholder="Título da notícia" required>
                <label for="noticia_descricao_curta">Descrição curta</label>
                <textarea name="noticia_descricao_curta" id="noticia_descricao_curta" class="editor"></textarea>
                <label for="noticia_descricao">Descrição</label>
                <textarea name="noticia_descricao" id="noticia_descricao" class="editor"></textarea>
                <label for="noticia_status" style="margin-top: 16px;">Visível?</label>
                <select name="noticia_status" id="noticia_status">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
                <div class="clear"></div>
                <button type="submit">Confirmar</button>
            </form>
        </div>
        <div id="editar-noticia" class="content suave">
            <h4 class="barlow">Editar notícia <i class="material-icons click fechar">close</i></h4>
            <form id="form-editar-noticia" action="{{ route('noticias.store') }}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="e_noticia_id" value="">
                <label for="e_noticia_titulo">Título</label>
                <input type="text" name="e_noticia_titulo" id="e_noticia_titulo" placeholder="Título do tópico" required>
                <label for="e_noticia_descricao_curta">Descrição</label>
                <textarea name="e_noticia_descricao_curta" id="e_noticia_descricao_curta" class="editor" maxlength="255"></textarea>
                <label for="e_noticia_descricao">Descrição</label>
                <textarea name="e_noticia_descricao" id="e_noticia_descricao" class="editor"></textarea>
                <label for="e_noticia_status" style="margin-top: 16px;">Visível?</label>
                <select name="e_noticia_status" id="e_noticia_status">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
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
    $(".nova-noticia").click(function(){
        $("#lateral, #nova-noticia").addClass("active");
        $("#form-nova-noticia").submit(function(e){
            e.preventDefault();
            $(this).find('button').prop('disabled', true);
            criarNoticia();
        });
    });

    $(document).on("click", ".ver-noticia", function(){
        $("#lateral, #ver-noticia").addClass("active");
        noticia($(this).attr("data-id"), 1);
    });

    var editar = "";
    $(document).on("click", ".editar-noticia", function(){
        $("#lateral, #editar-noticia").addClass("active");
        var noticia_id = $(this).attr("data-id");
        editar = noticia_id;
        noticia(noticia_id, 2);
    });

    $("#form-editar-noticia").submit(function(e){
        e.preventDefault();
        $(this).find('button').prop('disabled', true);
        editarNoticia(editar);
    });

    $(document).on("click", ".deletar-noticia", function(){
        var form = $(this).attr("data-form");
        $("#alerta").addClass("active");
        $('#'+form).submit(function(e){
            e.preventDefault();
            $("#alerta .sim").click(function(){
                deletaNoticia(form);
            });
        });
    });

    function noticia(noticia_id, operacao){
        request = $.ajax({
            url: 'noticias/'+noticia_id,
            type: 'get',
            error: function(){
                //criaAlerta(0,"Falha ao deletar categoria!!",2000);
                console.log("deu pal");
            }
        });
        request.done(function(response){
            if(operacao == 2){
                $('#form-editar-noticia input[name="e_noticia_titulo"]').val(response.noticia_titulo);
                $('#form-editar-noticia textarea[name="e_noticia_descricao_curta"]').val(response.noticia_descricao_curta);
                $('#form-editar-noticia select option[value="'+response.noticia_status+'"]').attr("selected", true);
                CKEDITOR.instances.e_noticia_descricao.setData(response.noticia_descricao);
            }else if(operacao == 1){
                $("#ver-noticia .noticia_titulo").text(response.noticia_titulo);
                $("#ver-noticia .noticia_descricao").html(response.noticia_descricao);
                var data = response.noticia_data.split(' ');
                var datasplit = data[0].split('-');
                $("#ver-noticia .noticia_data").text(datasplit[2]+'/'+datasplit[1]+'/'+datasplit[0]+' às '+data[1]);
                var dataup = response.noticia_data_up.split(' ');
                var datasplitup = dataup[0].split('-');
                $("#ver-noticia .noticia_data_up").text(datasplit[2]+'/'+datasplit[1]+'/'+datasplit[0]+' às '+data[1]);
            }
        });
    }

    function criarNoticia(){
        var noticia = {
            "_token" : $('#form-nova-noticia input[name="_token"]').val(),
            "noticia_titulo" : $('#form-nova-noticia input[name="noticia_titulo"]').val(),
            "noticia_descricao_curta" : $('#form-nova-noticia textarea[name="noticia_descricao_curta"]').val(),
            "noticia_descricao" : $('#form-nova-noticia textarea[name="noticia_descricao"]').val(),
            "noticia_status" : $('#form-nova-noticia select option:selected').val()
        };
        request = $.ajax({
            url: 'noticias',
            data: noticia,
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

    function editarNoticia(noticia_id){
        var noticia = {
            "_token" : $('#form-editar-noticia input[name="_token"]').val(),
            "e_noticia_id" : noticia_id,
            "e_noticia_titulo" : $('#form-editar-noticia input[name="e_noticia_titulo"]').val(),
            "e_noticia_descricao_curta" : $('#form-editar-noticia textarea[name="e_noticia_descricao_curta"]').val(),
            "e_noticia_descricao" : CKEDITOR.instances.e_noticia_descricao.getData(),
            "e_noticia_status" : $('#form-editar-noticia select option:selected').val()
        };
        request = $.ajax({
            url: 'noticias',
            data: noticia,
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

    function deletaNoticia(form){
        var noticia = {
            "_token" : $('#'+form+' input[name="_token"]').val(),
            "noticia_id" : $('#'+form+' input[name="d_noticia_id"]').val()
        };
        request = $.ajax({
            url: 'noticias/'+noticia.noticia_id,
            data: noticia,
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
    
    $("#lateral .fechar").click(function(){
        $("#lateral, #lateral .content").removeClass("active");
    });

    $("#alerta .nao").click(function(){
        $("#form-editar-noticia")[0].reset();
        $("#alerta").removeClass("active");
    });

    CKEDITOR.replace( 'noticia_descricao', {
        height: 400,
        filebrowserUploadUrl: "{{route('noticiaImagem', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

    CKEDITOR.replace( 'e_noticia_descricao', {
        height: 400,
        filebrowserUploadUrl: "{{route('noticiaImagem', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

</script>
@endsection