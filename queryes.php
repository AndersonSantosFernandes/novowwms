<?php 
// include_once("verify_login.php");
include_once("conexao.php"); 




$stmtPosicoes = $conn->query("SELECT * FROM posicoes");
$stmtPosicoes->execute();
$returnPosicoes = $stmtPosicoes->fetchAll(PDO::FETCH_ASSOC);

//Para consultar usuários 
$stmtUsers = $conn->query("SELECT * FROM users ORDER BY name");
$stmtUsers->execute();
$useSelect = $stmtUsers->fetchAll(PDO::FETCH_ASSOC);

//Query que tras dados e confugurações do usuário logado
$stmtColor = $conn->prepare("SELECT * FROM users WHERE email = :email");
$stmtColor->bindParam(":email",$_SESSION["user"]);
$stmtColor->execute();
$lineColor = $stmtColor->fetch();

// Querye para retornar todos os modelos

$stmtModelos = $conn->query("SELECT * FROM modelos ORDER BY modelo");
$stmtModelos->execute();
$returnModel = $stmtModelos->fetchAll(PDO::FETCH_ASSOC);

// Querye para retornar todos os status
$stmtStatus = $conn->query("SELECT * FROM status_list ORDER BY status");
$stmtStatus->execute();
$returnStatus = $stmtStatus->fetchAll(PDO::FETCH_ASSOC);




//Query que retorna informaçõe para alocamento de palet
$stmtInformacoesAlocamento = $conn->query("SELECT * FROM listainformacoescadastrar ORDER BY informacao");
$stmtInformacoesAlocamento->execute();
$linhasInformacao = $stmtInformacoesAlocamento->fetchAll(PDO::FETCH_ASSOC);

// Query que retorna o tempo de sessão
$stmtTempo = $conn->query("SELECT * FROM sessao");
$stmtTempo->execute();
$retornaTempo = $stmtTempo->fetch(PDO::FETCH_ASSOC);
$tempo = $retornaTempo["minutos"];


?>