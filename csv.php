<?php 

include_once("queryes.php"); 
// include_once("verify_login.php");


$diferenca = strtotime(" -5 hours ");
$datedate = date("dmYHis", $diferenca); 


$estado = filter_input(INPUT_GET,"estado");

if($estado == "ocupado"){

    $cabecalho = ["Posicao_Id","Posicao","Modelo","Status","Nota fiscal","Quantidade","Item Modelo","Un Medida","Contratante","Operacao","Origem","Destino","Observacao","Estado","Data modificacao","Usuario","Palete_ID"];

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename='.$estado.'_'.$datedate.'.csv');

    $arquivo = fopen('php://output', 'w');

    fputcsv($arquivo,$cabecalho, ";");

    foreach ($returnPosicoes as $posicoes){
        if($posicoes['estado'] == "Ocupado"){
        fputcsv($arquivo , mb_convert_encoding($posicoes,"ISO-8859-1","UTF-8"), ";" );
        }
    }

    fclose($arquivo);
}elseif($estado == "livre"){

    $cabecalho = ["Posicao_Id","Posicao","Modelo","Status","Nota fiscal","Quantidade","Item Modelo","Un Medida","Contratante","Operacao","Origem","Destino","Observacao","Estado","Data modificacao","Usuario","Palete_ID"];

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename='.$estado.'_'.$datedate.'.csv');

    $arquivo = fopen('php://output', 'w');

    fputcsv($arquivo,$cabecalho, ";");

    foreach ($returnPosicoes as $posicoes){

        if($posicoes['estado'] == "Livre"){
        fputcsv($arquivo , mb_convert_encoding($posicoes,"ISO-8859-1","UTF-8"), ";" );
        }
    }

    fclose($arquivo);

}elseif($estado == "todas"){

    $cabecalho = ["Posicao_Id","Posicao","Modelo","Status","Nota fiscal","Quantidade","Item Modelo","Un Medida","Contratante","Operacao","Origem","Destino","Observacao","Estado","Data modificacao","Usuario","Palete_ID"];

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename='.$estado.'_'.$datedate.'.csv');

    $arquivo = fopen('php://output', 'w');

    fputcsv($arquivo,$cabecalho, ";");

    foreach ($returnPosicoes as $posicoes){

        fputcsv($arquivo , mb_convert_encoding($posicoes,"ISO-8859-1","UTF-8"), ";" );

    }

    fclose($arquivo);

}elseif($estado == "caixas"){

    $cabecalho = ["id_modelo","modelo","quantidade"];

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename='.$estado.'_'.$datedate.'.csv');

    $arquivo = fopen('php://output', 'w');

    fputcsv($arquivo,$cabecalho, ";");

    foreach ($returnModel as $model){
        extract($model);
        if(substr($modelo, 0, 5) == "Caixa"){
            fputcsv($arquivo , mb_convert_encoding($model,"ISO-8859-1","UTF-8"), ";" );

        }
        
    }

    fclose($arquivo);

}

?>