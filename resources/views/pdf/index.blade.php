<?php 
//include("mpdf60/mpdf.php");

use Mpdf\Mpdf;

require_once __DIR__ . '../../../../vendor/autoload.php';

$titulo = $conteudo->conteudo_titulo;
$topico = "";
foreach($topicos as $t){
    if($t->topico_id == $conteudo->topico_id){
        $topico = $t->topico_titulo;
    }
}
$conteudo = $conteudo->conteudo_descricao;


$html = '  <div id="conteudo" style="font-family: Arial, Helvetica, sans-serif;">
                <h1 class="conteudo_titulo" style="font-weight: bold;text-align: center;margin-bottom: 0;">'.$titulo.'</h1>
                <h4 class="conteudo_topico" style="text-align: center;font-weight: bold;color: #777;">'.$topico.'</h4>
                <div class="conteudo_descricao" style="margin-top: 16px;padding: 50px 0;">'.$conteudo.'</div>
            </div>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();

exit;

?>