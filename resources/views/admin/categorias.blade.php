@extends('layouts.template')
@section('titulo','UNIMUGI | Categorias')
@section('conteudo')
<!-- WRAPPER ALL -->

    @include('layouts.menus.mSidebar')
    @include('layouts.header.mHeader')
    
    <main>
        <!-- Conteúdo principal central -->
        <div class="dashboard">
            <div id="categorias" class="box">
                <h3 class="barlow">
                    Categorias
                    <button class="click suave nova-categoria"><i class="material-icons">add_circle</i><span class="mini-title">Nova Categoria<span></button>
                </h3>
                <div id="categorias-list">
                    <ul class="list-head">
                        <li>
                            <div><h6 class="mini-title">#</h6></div>
                            <div><h6 class="mini-title">Título</h6></div>
                            <div><h6 class="mini-title">Visível?</h6></div>
                            <div><h6 class="mini-title">Ações</h6></div>
                        </li>
                    </ul>
                    <ul class="list-body">
                        @foreach($categorias as $categoria)
                            <li>
                                <div><h6>{{ $categoria->categoria_id }}</h6></div>
                                <div><h6>{{ $categoria->categoria_titulo }}</h6></div>
                                <div>
                                    <h6>
                                        @if($categoria->categoria_status == 1)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </h6>
                                </div>
                                <div>
                                    <i class="material-icons click editar-categoria" data-id="{{ $categoria->categoria_id }}">create</i>
                                    <form id="delete{{ $categoria->categoria_id }}" action="" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">                                  
                                        <input type="hidden" name="d_categoria_id" value="{{ $categoria->categoria_id }}">
                                        <button type="submit" class="click"><i class="material-icons deletar-categoria" data-form="delete{{ $categoria->categoria_id }}">delete</i></button>
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
        <div id="nova-categoria" class="content suave">
            <h4 class="barlow">Nova categoria <i class="material-icons click fechar">close</i></h4>
            <form id="form-nova-categoria" action="{{ route('categorias.store') }}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <label for="categoria-titulo">Título</label>
                <input type="text" name="categoria_titulo" id="categoria_titulo" placeholder="Título da categoria" required>
                <div class="clear"></div>
                <button type="submit">Confirmar</button>
            </form>
        </div>
        <div id="editar-categoria" class="content suave">
            <h4 class="barlow">Editar categoria <i class="material-icons click fechar">close</i></h4>
            <form id="form-editar-categoria" action="{{ route('categorias.store') }}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="e_categoria_id" value="">
                <label for="e_categoria_titulo">Título</label>
                <input type="text" name="e_categoria_titulo" id="e_categoria_titulo" placeholder="Título da categoria" required>
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
    $(".nova-categoria").click(function(){
        $("#lateral, #nova-categoria").addClass("active");
        $("#form-nova-categoria").submit(function(e){
            e.preventDefault();
            $(this).find('button').prop('disabled', true);
            criarCategoria();
        });
    });

    var editar = "";
    $(document).on("click", ".editar-categoria", function(){
        $("#lateral, #editar-categoria").addClass("active");
        var categoria_id = $(this).attr("data-id");
        editar = categoria_id;
        categoria(categoria_id);
    });
    
    $("#form-editar-categoria").submit(function(e){
        e.preventDefault();
        $(this).find('button').prop('disabled', true);
        editarCategoria(editar);
    });

    $(document).on("click", ".deletar-categoria", function(){
        var form = $(this).attr("data-form");
        $("#alerta").addClass("active");
        $('#'+form).submit(function(e){
            e.preventDefault();
            $("#alerta .sim").click(function(){
                deletaCategoria(form);
            });
        });
    });

    function categoria(categoria_id){
        request = $.ajax({
            url: 'categorias/'+categoria_id,
            type: 'get',
            error: function(){
                //criaAlerta(0,"Falha ao deletar categoria!!",2000);
                console.log("deu pal");
            }
        });
        request.done(function(response){
            $('#form-editar-categoria input[name="e_categoria_titulo"]').val(response.categoria_titulo);
        });
    }

    function criarCategoria(){
        var categoria = {
            "_token" : $('#form-nova-categoria input[name="_token"]').val(),
            "categoria_titulo" : $('#form-nova-categoria input[name="categoria_titulo"]').val()
        };
        request = $.ajax({
            url: 'categorias',
            data: categoria,
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

    function editarCategoria(categoria_id){
        var categoria = {
            "_token" : $('#form-editar-categoria input[name="_token"]').val(),
            "e_categoria_id" : categoria_id,
            "e_categoria_titulo" : $('#form-editar-categoria input[name="e_categoria_titulo"]').val()
        };
        request = $.ajax({
            url: 'categorias',
            data: categoria,
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

    function deletaCategoria(form){
        var categoria = {
            "_token" : $('#'+form+' input[name="_token"]').val(),
            "categoria_id" : $('#'+form+' input[name="d_categoria_id"]').val()
        };
        request = $.ajax({
            url: 'categorias/'+categoria.categoria_id,
            data: categoria,
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