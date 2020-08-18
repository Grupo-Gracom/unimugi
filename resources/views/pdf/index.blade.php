<?php 
 //include("mpdf60/mpdf.php");

use Mpdf\Mpdf;

 require_once __DIR__ . '../../../../vendor/autoload.php';

 $titulo = $conteudo->conteudo_titulo;
 $topico = "";
 foreach($topicos as $t){
     if($t->topico_id == $conteudo->conteudo_id){
         $topico = $t->topico_titulo;
     }
 }
 $conteudo = $conteudo->conteudo_descricao;
//  $data = $conteudo->conteudo_data;
// $data_up = $conteudo->conteudo_data_up;

 
 $html = '  <div id="lateral" class="suave">
                <div class="overlay suave"></div>
                <div id="ver-conteudo" class="content suave">
                    <div class="conteudo">
                        <h1 class="conteudo_titulo" style="margin-bottom: 0;">'.$titulo.'</h1>
                        <h4 class="conteudo_topico">'.$topico.'</h4>
                        <p class="conteudo_datas">Criado em <b class="conteudo_data"></b><br> Atualizado em <b class="conteudo_data_up"></b></p>
                        <div class="conteudo_descricao box">'.$conteudo.'</div>
                        <div class="imprimir click"><i class="material-icons">print</i></div>
                    </div>
                </div>
            </div>';
 
 $mpdf = new \Mpdf\Mpdf();
 $css = file_get_contents(__DIR__ .'../../../../assets/css/gleidson.css');
 $mpdf->WriteCSS($css, 1);
 $mpdf->WriteHTML($html);
 $mpdf->Output();
 
 exit;

 ?>