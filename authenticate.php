<?php
include_once("conexao.php");
include_once("global.php");
include_once("models/Message.php");


$mensagens = new Message();

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");

if ($email && $password) {
    // Se estiver vindo email e senha

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND pass = md5(:pass)");

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pass", $password);
    $stmt->execute();


    $showName = $stmt->fetch();


    if ($stmt->rowCount() == 1) {

        
        

        $showEmail = $showName["email"];
        $fullName = $showName["name"] . " " . $showName["lastName"];

        $_SESSION['user'] = $showEmail;
        $_SESSION['fulname'] = $fullName;
        $mensagens->setMessage("Logado com sucesso <a href=''>X</a>", "win");
        header("location: initial.php");
    } else {
        $mensagens->setMessage("E-mail e senha  não combinam  <a href=''>X</a>", "fall");
        header("location: index.php");
    }


} else {
    //Se vir um ou outro
    $mensagens->setMessage("Se não preencher não vai né <a href=''>X</a>", "fall");
    header("location: index.php");


}



?>