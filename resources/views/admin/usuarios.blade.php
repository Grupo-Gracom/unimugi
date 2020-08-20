@extends('layouts.template')
@section('titulo','UNIMUGI | Topicos')
@section('conteudo')
<!-- WRAPPER ALL -->

    @include('layouts.menus.mSidebar')
    @include('layouts.header.mHeader')
    
    <main>
        <!-- Conteúdo principal central -->
        <div class="dashboard">
            <div id="usuarios" class="box">
                <h3 class="barlow">
                    Usuários
                    <button class="click suave novo-usuario"><i class="material-icons">add_circle</i><span class="mini-title">Novo Usuário<span></button>
                </h3>
                <div id="usuarios-list">
                    <ul class="list-head">
                        <li>
                            <div><h6 class="mini-title">#</h6></div>
                            <div><h6 class="mini-title">Nome</h6></div>
                            <div><h6 class="mini-title">Email</h6></div>
                            <div><h6 class="mini-title">Nível</h6></div>
                            <div><h6 class="mini-title">Ativo?</h6></div>
                            <div><h6 class="mini-title">Ações</h6></div>
                        </li>
                    </ul>
                    <ul class="list-body">
                        @foreach($usuarios as $usuario)
                        <li>
                                <div><h6>{{ $usuario->id }}</h6></div>
                                <div><h6>{{ $usuario->name }}</h6></div>
                                <div><h6>{{ $usuario->email }}</h6></div>
                                <div>
                                    <h6>
                                        @if($usuario->nivel == 1)
                                            Admin
                                        @else
                                            Colaborador
                                        @endif
                                    </h6>
                                </div>
                                <div>
                                    <h6>
                                        @if($usuario->status == 0)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </h6>
                                </div>
                                <div>
                                    <i class="material-icons click editar-usuario" data-id="{{ $usuario->id }}">create</i>
                                    <form id="delete{{ $usuario->id }}" action="" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">                                  
                                        <input type="hidden" name="d_usuario_id" value="{{ $usuario->id }}">
                                        <button type="submit" class="click"><i class="material-icons deletar-usuario" data-form="delete{{ $usuario->id }}">delete</i></button>
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
        <div id="novo-usuario" class="content suave">
            <h4 class="barlow">Novo usuário <i class="material-icons click fechar">close</i></h4>
            <form id="form-novo-usuario" action="{{ route('usuarios.store') }}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <label for="usuario_nome">Nome</label>
                <input type="text" name="usuario_nome" id="usuario_nome" placeholder="Nome do usuário" required>
                <label for="usuario_email">Email</label>
                <input type="text" name="usuario_email" id="usuario_email" placeholder="Email do usuário" required>
                <label for="usuario_senha">Senha</label>
                <input type="text" name="usuario_senha" id="usuario_senha" placeholder="Senha do usuário" required>
                <label for="usuario_nivel">Nível</label>
                <select name="usuario_nivel" id="usuario_nivel">
                    <option value="0">Colaborador</option>
                    <option value="1">Admin</option>
                </select>
                <label for="usuario_status">Status</label>
                <select name="usuario_status" id="usuario_status">
                    <option value="0">Ativo</option>
                    <option value="1">Bloqueado</option>
                </select>
                <div class="clear"></div>
                <button type="submit">Confirmar</button>
            </form>
        </div>
        <div id="editar-usuario" class="content suave">
            <h4 class="barlow">Editar tópico <i class="material-icons click fechar">close</i></h4>
            <form id="form-editar-usuario" action="{{ route('usuarios.store') }}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="e_usuario_id" value="">
                <label for="e_usuario_nome">Nome</label>
                <input type="text" name="e_usuario_nome" id="e_usuario_nome" placeholder="Nome do usuário" required>
                <label for="usuario_email">Email</label>
                <input type="text" name="e_usuario_email" id="e_usuario_email" placeholder="Email do usuário" required>
                <label for="usuario_senha">Senha</label>
                <input type="text" name="e_usuario_senha" id="e_usuario_senha" placeholder="Senha do usuário">
                <label for="e_usuario_nivel">Nível</label>
                <select name="e_usuario_nivel" id="e_usuario_nivel">
                    <option value="0">Colaborador</option>
                    <option value="1">Admin</option>
                </select>
                <label for="e_usuario_status">Status</label>
                <select name="e_usuario_status" id="e_usuario_status">
                    <option value="0">Ativo</option>
                    <option value="1">Bloqueado</option>
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
    $(".novo-usuario").click(function(){
        $("#lateral, #novo-usuario").addClass("active");
        $("#form-novo-usuario").submit(function(e){
            e.preventDefault();
            $(this).find('button').prop('disabled', true);
            criarUsuario();
        });
    });

    var editar = "";
    $(document).on("click", ".editar-usuario", function(){
        $("#lateral, #editar-usuario").addClass("active");
        var usuario_id = $(this).attr("data-id");
        editar = usuario_id;
        usuario(usuario_id);
    });
    
    $("#form-editar-usuario").submit(function(e){
        e.preventDefault();
        $(this).find('button').prop('disabled', true);
        editarUsuario(editar);
    });

    $(document).on("click", ".deletar-usuario", function(){
        var form = $(this).attr("data-form");
        $("#alerta").addClass("active");
        $('#'+form).submit(function(e){
            e.preventDefault();
            $("#alerta .sim").click(function(){
                deletaUsuario(form);
            });
        });
    });

    function usuario(usuario_id){
        request = $.ajax({
            url: 'usuarios/'+usuario_id,
            type: 'get',
            error: function(){
                //criaAlerta(0,"Falha ao deletar categoria!!",2000);
                console.log("deu pal");
            }
        });
        request.done(function(response){
            $('#form-editar-usuario input[name="e_usuario_nome"]').val(response.name);
            $('#form-editar-usuario input[name="e_usuario_email"]').val(response.email);
            $('#form-editar-usuario #e_usuario_nivel option[value="'+response.nivel+'"]').attr("selected", true);
            $('#form-editar-usuario #e_usuario_status option[value="'+response.status+'"]').attr("selected", true);
        });
    }

    function criarUsuario(){
        var usuario = {
            "_token" : $('#form-novo-usuario input[name="_token"]').val(),
            "usuario_nome" : $('#form-novo-usuario input[name="usuario_nome"]').val(),
            "usuario_email" : $('#form-novo-usuario input[name="usuario_email"]').val(),
            "usuario_senha" : $('#form-novo-usuario input[name="usuario_senha"]').val(),
            "usuario_nivel" : $('#form-novo-usuario #usuario_nivel option:selected').val(),
            "usuario_status" : $('#form-novo-usuario #usuario_status option:selected').val()
        };
        request = $.ajax({
            url: 'usuarios',
            data: usuario,
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

    function editarUsuario(usuario_id){
        var usuario = {
            "_token" : $('#form-editar-usuario input[name="_token"]').val(),
            "e_usuario_id" : usuario_id,
            "e_usuario_nome" : $('#form-editar-usuario input[name="e_usuario_nome"]').val(),
            "e_usuario_email" : $('#form-editar-usuario input[name="e_usuario_email"]').val(),
            "e_usuario_senha" : $('#form-editar-usuario input[name="e_usuario_senha"]').val(),
            "e_usuario_nivel" : $('#form-editar-usuario #e_usuario_nivel option:selected').val(),
            "e_usuario_status" : $('#form-editar-usuario #e_usuario_status option:selected').val()
        };
        request = $.ajax({
            url: 'usuarios',
            data: usuario,
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

    function deletaUsuario(form){
        var usuario = {
            "_token" : $('#'+form+' input[name="_token"]').val(),
            "usuario_id" : $('#'+form+' input[name="d_usuario_id"]').val()
        };
        request = $.ajax({
            url: 'usuarios/'+usuario.usuario_id,
            data: usuario,
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