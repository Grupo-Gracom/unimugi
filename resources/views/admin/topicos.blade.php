@extends('layouts.template')
@section('titulo','UNIMUGI | Topicos')
@section('conteudo')
<!-- WRAPPER ALL -->

    @include('layouts.menus.mSidebar')
    @include('layouts.header.mHeader')
    
    <main>
        <!-- Conteúdo principal central -->
        <div class="dashboard">
            <div id="topicos" class="box">
                <h3 class="barlow">
                    Tópicos
                    <button class="click suave novo-topico"><i class="material-icons">add_circle</i><span class="mini-title">Novo Tópico<span></button>
                </h3>
                <div id="topicos-list">
                    <ul class="list-head">
                        <li>
                            <div><h6 class="mini-title">#</h6></div>
                            <div><h6 class="mini-title">Título</h6></div>
                            <div><h6 class="mini-title">Categoria</h6></div>
                            <div><h6 class="mini-title">Visível?</h6></div>
                            <div><h6 class="mini-title">Ações</h6></div>
                        </li>
                    </ul>
                    <ul class="list-body">
                        @foreach($topicos as $topico)
                            <li>
                                <div><h6>{{ $topico->topico_id }}</h6></div>
                                <div><h6>{{ $topico->topico_titulo }}</h6></div>
                                <div>
                                    <h6>
                                    @foreach($categorias as $categoria)
                                        @if($categoria->categoria_id == $topico->categoria_id)
                                            {{ $categoria->categoria_titulo }}
                                        @endif
                                    @endforeach
                                    </h6>
                                </div>
                                <div>
                                    <h6>
                                        @if($topico->topico_status == 1)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </h6>
                                </div>
                                <div>
                                    <i class="material-icons click editar-topico" data-id="{{ $topico->topico_id }}">create</i>
                                    <form id="delete{{ $topico->topico_id }}" action="" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">                                  
                                        <input type="hidden" name="d_topico_id" value="{{ $topico->topico_id }}">
                                        <button type="submit" class="click"><i class="material-icons deletar-topico" data-form="delete{{ $topico->topico_id }}">delete</i></button>
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
        <div id="novo-topico" class="content suave">
            <h4 class="barlow">Novo tópico <i class="material-icons click fechar">close</i></h4>
            <form id="form-novo-topico" action="{{ route('topicos.store') }}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <label for="topico_titulo">Título</label>
                <input type="text" name="topico_titulo" id="topico_titulo" placeholder="Título do tópico" required>
                <label for="categoria_id">Categoria</label>
                <select name="categoria_id" id="categoria_id">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->categoria_id }}">{{ $categoria->categoria_titulo }}</option>
                    @endforeach
                </select>
                <label for="topico_status" style="margin-top: 16px;">Visível?</label>
                    <select name="topico_status" id="topico_status">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                <div class="clear"></div>
                <button type="submit">Confirmar</button>
            </form>
        </div>
        <div id="editar-topico" class="content suave">
            <h4 class="barlow">Editar tópico <i class="material-icons click fechar">close</i></h4>
            <form id="form-editar-topico" action="{{ route('topicos.store') }}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="e_topico_id" value="">
                <label for="e_topico_titulo">Título</label>
                <input type="text" name="e_topico_titulo" id="e_topico_titulo" placeholder="Título do tópico" required>
                <label for="e_topico_categoria">Categoria</label>
                <select name="e_categoria_id" id="e_categoria_id">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->categoria_id }}">{{ $categoria->categoria_titulo }}</option>
                    @endforeach
                </select>
                <label for="e_topico_status" style="margin-top: 16px;">Visível?</label>
                    <select name="e_topico_status" id="e_topico_status">
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
    $(".novo-topico").click(function(){
        $("#lateral, #novo-topico").addClass("active");
        $("#form-novo-topico").submit(function(e){
            e.preventDefault();
            $(this).find('button').prop('disabled', true);
            criarTopico();
        });
    });

    var editar = "";
    $(document).on("click", ".editar-topico", function(){
        $("#lateral, #editar-topico").addClass("active");
        var topico_id = $(this).attr("data-id");
        editar = topico_id;
        topico(topico_id);
    });
    
    $("#form-editar-topico").submit(function(e){
        e.preventDefault();
        $(this).find('button').prop('disabled', true);
        editarTopico(editar);
    });

    $(document).on("click", ".deletar-topico", function(){
        var form = $(this).attr("data-form");
        $("#alerta").addClass("active");
        $('#'+form).submit(function(e){
            e.preventDefault();
            $("#alerta .sim").click(function(){
                deletaTopico(form);
            });
        });
    });

    function topico(topico_id){
        request = $.ajax({
            url: 'topicos/'+topico_id,
            type: 'get',
            error: function(){
                //criaAlerta(0,"Falha ao deletar categoria!!",2000);
                console.log("deu pal");
            }
        });
        request.done(function(response){
            $('#form-editar-topico input[name="e_topico_titulo"]').val(response.topico_titulo);
            $('#form-editar-topico #e_categoria_id option[value="'+response.categoria_id+'"]').attr("selected", true);
            $('#form-editar-topico #e_topico_status option[value="'+response.topico_status+'"]').attr("selected", true);
        });
    }

    function criarTopico(){
        var topico = {
            "_token" : $('#form-novo-topico input[name="_token"]').val(),
            "topico_titulo" : $('#form-novo-topico input[name="topico_titulo"]').val(),
            "topico_status" : $('#form-novo-topico #topico_status option:selected').val(),
            "categoria_id" : $('#form-novo-topico #categoria_id option:selected').val()
        };
        request = $.ajax({
            url: 'topicos',
            data: topico,
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

    function editarTopico(topico_id){
        var topico = {
            "_token" : $('#form-editar-topico input[name="_token"]').val(),
            "e_topico_id" : topico_id,
            "e_topico_titulo" : $('#form-editar-topico input[name="e_topico_titulo"]').val(),
            "e_topico_status" : $('#form-editar-topico #e_topico_status option:selected').val(),
            "e_categoria_id" : $('#form-editar-topico #e_categoria_id option:selected').val()
        };
        request = $.ajax({
            url: 'topicos',
            data: topico,
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

    function deletaTopico(form){
        var topico = {
            "_token" : $('#'+form+' input[name="_token"]').val(),
            "topico_id" : $('#'+form+' input[name="d_topico_id"]').val()
        };
        request = $.ajax({
            url: 'topicos/'+topico.topico_id,
            data: topico,
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
        $("#alerta").removeClass("active");
    });

</script>
@endsection