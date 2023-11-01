<?php 
include_once("verify_login.php");
include_once("conexao.php");

// Query que retorna o total de posições cadastradas
$stmtOcupacao = $conn->query("SELECT * FROM posicoes");
$stmtOcupacao->execute();
$posicoes = $stmtOcupacao->fetchAll(PDO::FETCH_ASSOC);
$linhasTotais = $stmtOcupacao->rowCount();


// Querye que retorna a soma de posições ocupadas
$stmtOcupadas = $conn->query("SELECT * FROM posicoes WHERE estado = 'Ocupado'");
$stmtOcupadas->execute();
$linhasOcupadas = $stmtOcupadas->rowCount();

// Querye que retorna a soma de posições livres
$stmtLivres = $conn->query("SELECT * FROM posicoes WHERE estado = 'Livre'");
$stmtLivres->execute();
$linhasLivres = $stmtLivres->rowCount();

// Querye que retorna a soma de posições bloqueadas
$stmtBloqueados = $conn->query("SELECT * FROM posicoes WHERE estado = 'Bloqueado'");
$stmtBloqueados->execute();
$linhasBloqueados = $stmtBloqueados->rowCount();

// Querye que retorna a soma de posições de picking
$stmtPicking = $conn->query("SELECT * FROM posicoes WHERE estado = 'Picking'");
$stmtPicking->execute();
$linhasPicking = $stmtPicking->rowCount();

// Querye para retornar todos os status
$stmtStatus = $conn->query("SELECT * FROM status_list ORDER BY status");
$stmtStatus->execute();
$returnStatus = $stmtStatus->fetchAll(PDO::FETCH_ASSOC);

$linhasUtilizaveis = $linhasTotais - ($linhasBloqueados + $linhasPicking);

$porcentagemOcupação = ($linhasOcupadas / $linhasUtilizaveis) * 100 ;
$porcentagemLivre = ($linhasLivres / $linhasUtilizaveis) * 100 ;





?>