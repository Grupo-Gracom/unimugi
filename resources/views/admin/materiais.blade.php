@extends('layouts.template')
@section('titulo','UNIMUGI | Materiais')
@section('conteudo')
<!-- WRAPPER ALL -->

    @include('layouts.menus.mSidebar')
    @include('layouts.header.mHeader')

    <main>
        <!-- Conteúdo principal central -->
        <div class="dashboard">
            <div id="materiais" class="box">
                <h3 class="barlow">
                    Materiais
                    <button class="click suave novo-material"><i class="material-icons">add_circle</i><span class="mini-title">Novo Material<span></button>
                </h3>
                <div id="materiais-list">
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
                        @foreach($materiais as $material)
                            <li>
                                <div><h6>{{ $material->material_id }}</h6></div>
                                <div><h6>{{ $material->title }}</h6></div>
                                <div>
                                    @foreach($categorias as $categoria)
                                        <h6>
                                        @if($material->categoria_id == $categoria->categoria_id )
                                        {{ $categoria->categoria_titulo }}
                                    </h6>
                                    @endif
                                    @endforeach
                                    </div>
                                  <div>
                                    <h6>
                                        @if($material->material_status == 1)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </h6>
                                </div>
                                <div>
                                    <i class="material-icons click editar-material" data-id="{{ $material->material_id }}">create</i>
                                    <form id="delete{{ $material->material_id }}" action="" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="d_material_id" value="{{ $material->material_id }}">
                                        <button type="submit" class="click"><i class="material-icons deletar-material" data-form="delete{{ $material->material_id }}">delete</i></button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </main>

    <!-- LATERAL CONTENT -->
    <div id="lateral" class="suave">
        <div class="overlay suave"></div>
        <div id="novo-material" class="content suave">
            <h4 class="barlow">Novo Material <i class="material-icons click fechar">close</i></h4>
            <form id="form-novo-material" action="{{ route('materiais.store') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <label for="material-titulo">Título</label>
                <input type="text" name="title" id="material_titulo" placeholder="Título do material" required>
                   <label for="categoria_id" style="margin-top: 16px;">Categoria</label>
                    <select name="categoria_id" id="categoria_id">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->categoria_id }}">{{ $categoria->categoria_titulo }}</option>
                        @endforeach
                    </select>
                {{-- {{ csrf_field() }} --}}
                <input type="file" name="arquivo" id="arquivo" required>
                <div class="metade direita">
                    <label for="material_status" style="margin-top: 16px;">Visível?</label>
                    <select name="material_status" id="material_status">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
                <div class="clear"></div>
                <button type="submit">Confirmar</button>
            </form>
        </div>
        <div id="editar-material" class="content suave">
            <h4 class="barlow">Editar material <i class="material-icons click fechar">close</i></h4>
            <form id="form-editar-material" action="{{ route('materiais.store')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="e_material_id" value="">
                <label for="e_material_titulo">Título</label>
                <input type="text" name="e_material_titulo" id="e_material_titulo" placeholder="Título do material" required>
                   <label for="categoria_id" style="margin-top: 16px;">Categoria</label>
                    <select name="categoria_id" id="categoria_id">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->categoria_id }}">{{ $categoria->categoria_titulo }}</option>
                        @endforeach
                    </select>
                {{-- {{ csrf_field() }} --}}
                <input type="file" name="arquivo" id="image" required>
                <div class="metade direita">
                    <label for="e_material_status" style="margin-top: 16px;">Visível?</label>
                    <select name="e_material_status" id="e_material_status">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
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
    $(".novo-material").click(function(){
        $("#lateral, #novo-material").addClass("active");
        // $("#form-novo-material").submit(function(e){
        //     e.preventDefault();
        //     $(this).find('button').prop('disabled', true);
        //     criarMaterial();
        // });
    });

    var editar = "";
    $(document).on("click", ".editar-material", function(){
        $("#lateral, #editar-material").addClass("active");
        var material_id = $(this).attr("data-id");
        editar = material_id;
        material(material_id);
    });

    $("#form-editar-material").submit(function(e){
        e.preventDefault();
        $(this).find('button').prop('disabled', true);
        editarMaterial(editar);
    });

    $(document).on("click", ".deletar-material", function(){
        var form = $(this).attr("data-form");
        $("#alerta").addClass("active");
        $('#'+form).submit(function(e){
            e.preventDefault();
            $("#alerta .sim").click(function(){
                deletaMaterial(form);
            });
        });
    });

    function material(material_id){
        request = $.ajax({
            url: 'materiais/'+material_id,
            type: 'get',
            error: function(){
                //criaAlerta(0,"Falha ao deletar categoria!!",2000);
                console.log("deu pal");
            }
        });
        request.done(function(response){
            $('#form-editar-material input[name="e_material_titulo"]').val(response.material_titulo);
        });
    }

    function criarMaterial(){
        var material = {
            "_token" : $('#form-novo-material input[name="_token"]').val(),
            "material_titulo" : $('#form-novo-material input[name="title"]').val(),
            "arquivo" : $('#form-novo-material input[name="arquivo"]').val(),
            "categoria_id" : $('#form-novo-material #categoria_id option:selected').val(),
            "material_status" : $('#form-novo-material #material_status option:selected').val()
        };
        request = $.ajax({
            url: 'materiais',
            data: material,
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

    function editarMaterial(material_id){
        var material = {
            "_token" : $('#form-editar-material input[name="_token"]').val(),
            "e_material_id" : material_id,
            "e_material_titulo" : $('#form-editar-material input[name="e_material_titulo"]').val(),
            "e_arquivo" : $('#form-editar-material input[name="e_arquivo"]').val(),
            "e_categoria_id" : $('#form-editar-material #e_categoria_id option:selected').val(),
            "e_material_status" : $('#form-editar-material #e_material_status option:selected').val()
        };
        request = $.ajax({
            url: 'materiais',
            data: material,
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

    function deletaMaterial(form){
        var material = {
            "_token" : $('#'+form+' input[name="_token"]').val(),
            "material_id" : $('#'+form+' input[name="d_material_id"]').val()
        };
        request = $.ajax({
            url: 'materiais/'+material.material_id,
            data: material,
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




{{-- @extends('layouts.template')
@section('titulo','UNIMUGI | Material')
@section('conteudo')
<!-- WRAPPER ALL -->
    <div class="container">
    <form action="/" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo">
        </div>
        <div class="form-group">
              <label for="categoria_id" style="margin-top: 16px;">Categoria</label>
                    <select name="categoria_id" id="categoria_id">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->categoria_id }}">{{ $categoria->categoria_titulo }}</option>
                        @endforeach
                    </select>
        </div>
     <div class="form-group">
        {{ csrf_field() }}
        <input type="file" name="arquivo" id="image" required>
        <button type="submit"class="btn btn-primary">Publicar</button>
        </form>
    </div>
</div>

@endsection --}}