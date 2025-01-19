<?php

include_once("conexao.php");
include_once("models/Message.php");

$mensagens = new Message();

$action = filter_input(INPUT_POST, "action");
$modelo = filter_input(INPUT_POST, "modelo");

$quantidadeAlterada = filter_input(INPUT_POST, "quantidadeAlterada");
$operacao = filter_input(INPUT_POST, "operacao");
$usuario = filter_input(INPUT_POST, "usuario");
$alterada = $quantidadeAlterada;
$reporModelo = $modelo;

if ($action == "reporEmbalagem") {

}
elseif($action == "subtrairCaixas") {
if($modelo && $quantidadeAlterada) {
    

    $stmtQuantidade = $conn->prepare("SELECT * FROM modelos WHERE modelo = :modelo");
    $stmtQuantidade->bindParam(":modelo",$modelo);
    $stmtQuantidade->execute();
    $quantidadeEstoque = $stmtQuantidade->fetch(PDO::FETCH_ASSOC);
    $qtEstoque = $quantidadeEstoque['quantidade'];

    

    if($quantidadeAlterada > $quantidadeEstoque['quantidade']){
        $mensagens->setMessage("Valor maior que o saldo em estoque ","fall"); 
    }else{

        $subtracao = $qtEstoque - $quantidadeAlterada;
        

        $stmtSubtrair = $conn->prepare("UPDATE modelos SET quantidade = :quantidade WHERE modelo = :modelo  ");
        $stmtSubtrair->bindParam(":modelo",$modelo);
        $stmtSubtrair->bindParam(":quantidade",$subtracao);
        $stmtSubtrair->execute();

         $stmtLog = $conn->prepare("INSERT INTO log_insumos (modelo, acao, quantidade, usuario, data)
            VALUES(:modelo, :acao, :quantidade, :usuario, CURRENT_DATE ) ");
            $stmtLog->bindparam(":modelo",$reporModelo);
            $stmtLog->bindparam(":acao",$operacao);
            $stmtLog->bindparam(":quantidade",$alterada);
            $stmtLog->bindparam(":usuario",$usuario);
            $stmtLog->execute();

        $mensagens->setMessage("Subtraido com sucesso","win");
    }


}else{
$mensagens->setMessage("Selecione o modelo ","fall");
}
header("location:embalagens.php");
}
elseif($action == "reporCaixas") {


    if($modelo && $quantidadeAlterada) {

        $stmtQuantidade = $conn->prepare("SELECT * FROM modelos WHERE modelo = :modelo");
        $stmtQuantidade->bindParam(":modelo",$modelo);
        $stmtQuantidade->execute();
        $quantidadeEstoque = $stmtQuantidade->fetch(PDO::FETCH_ASSOC);
        $qtEstoque = $quantidadeEstoque['quantidade'];

        if($quantidadeAlterada < 1){
            $mensagens->setMessage("Somente valores maiores que 1","fall"); 
        }else{
    
            $adicao = $qtEstoque + $quantidadeAlterada;
            
    //ainda falta colocar a coluna com a quantidade reposta e adicionar nas querys
            $stmtRepor = $conn->prepare("UPDATE modelos SET quantidade = :quantidade WHERE modelo = :modelo  ");
            $stmtRepor->bindParam(":modelo",$modelo);
            $stmtRepor->bindParam(":quantidade",$adicao);
            $stmtRepor->execute();


            $stmtLog = $conn->prepare("INSERT INTO log_insumos (modelo, acao, quantidade, usuario, data)
            VALUES(:modelo, :acao, :quantidade, :usuario, CURRENT_DATE ) ");
            $stmtLog->bindparam(":modelo",$reporModelo);
            $stmtLog->bindparam(":acao",$operacao);
            $stmtLog->bindparam(":quantidade",$alterada);
            $stmtLog->bindparam(":usuario",$usuario);
            $stmtLog->execute();
    
            $mensagens->setMessage("Alterado com sucesso","win");
        }

    }
    else{
        $mensagens->setMessage("Selecione o modelo ","fall");  
    }
    header("location:embalagens.php");
}
elseif($action == "") {

}
elseif($action == "") {

}

?>