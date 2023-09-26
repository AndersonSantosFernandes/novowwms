<?php 

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


$porcentagemOcupação = ($linhasOcupadas / $linhasTotais) * 100 ;
$porcentagemLivre = ($linhasLivres / $linhasTotais) * 100 ;


// Querye para retornar todos os status
$stmtStatus = $conn->query("SELECT * FROM status_list ORDER BY status");
$stmtStatus->execute();
$returnStatus = $stmtStatus->fetchAll(PDO::FETCH_ASSOC);







?>