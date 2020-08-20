<div id="ultimasNoticias" class="box">
    <div class="title_holder">
        <h3 class="barlow">Últimas notícias</h3>
        <p>Acompanhe as novidades.</p>
    </div>
    <ul>
        @foreach($ultimasNoticias as $noticia)
        <li>
            <h6 class="barlow">
                <?php
                    $data = new DateTime($noticia->noticia_data);
                    $criadoEm = $data->format("d/m/Y");
                    echo $criadoEm;
                ?>
            </h6>
            <div class="noticia">
                <!-- <figure>
                    <img src="{{asset('assets/img/slide/1.jpg')}}"  alt="">
                </figure> -->
                <h6 class="barlow">{{ $noticia->noticia_titulo }}</h6>
                <div class="descricao">{{ $noticia->noticia_descricao_curta }}</div>
                <a href="noticia/{{ $noticia->noticia_id}}">Saiba mais</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>
