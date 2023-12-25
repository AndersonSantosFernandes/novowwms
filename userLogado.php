<?php 

include_once("conexao.php");
include_once("global.php");

$userLog = $_SESSION['user'];


$stmtUser = $conn->prepare("SELECT * FROM users WHERE email = :email");
$stmtUser->bindParam(":email",$userLog);
$stmtUser->execute();
$returnUser = $stmtUser->fetch(PDO::FETCH_ASSOC);
$returnFulName = $returnUser['name']." ". $returnUser['lastName'];

?>