<?php
include_once("global.php");
include_once("models/Message.php");
include_once("conexao.php");
// include_once("verify_login.php");

$user_log = null;
if (isset($_SESSION['user'])) {
    $user_log = $_SESSION['user'];
    $user_name = $_SESSION['fulname'];
}
$messagen = new Message($BASE_URL);

$exibeMensagem = $messagen->getMessage();
if (!empty($exibeMensagem['mensage'])) {
    $messagen->clearMessage();
} 

?>

<!DOCTYPE html>
<html lang="pt br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.css"
        integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Link font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <title>Document</title>

    <!-- Using select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="scripts/script.js"></script>
    <div id='show'></div>
</head>
<header>
    <nav>
        <ul> 
            <li>                
                <div class="row">
                    <div class="col-md-7">
                        <a href="initial.php">HOME</a>
                        <a href="logout.php">Sair</a>
                        <a class="nameInt">
                            <?= $user_name ?>
                        </a>                       
                    </div>
                </div>              
            </li>
        </ul>
    </nav>
</header>
<!-- Usar o trecho abaixo para expirar a sessão -->
<!-- <body onload="resetTime()"> -->
<body>
    <?php if (!empty($exibeMensagem['mensage'])): ?>

        <div class="<?php echo $exibeMensagem['type']; ?>">

            <?= $exibeMensagem['mensage'] ?>

        </div>

    <?php endif; ?>