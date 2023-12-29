<?php
include_once("global.php");
include_once("models/Message.php");
include_once("conexao.php");
include_once("css/style.php");
include_once("verify_login.php");
include_once("queryes.php");

$user_log = null;
if (isset($_SESSION['user'])) {
    $user_log = $_SESSION['user'];
    $user_name = $_SESSION['fulname'];
}
$messagen = new Message();

$exibeMensagem = $messagen->getMessage();
if (!empty($exibeMensagem['mensage'])) {
  $mtop ="";
    $messagen->clearMessage();
}

?>

<!DOCTYPE html>
<html lang="pt br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/empty.jpg" type="image/x-icon">
    <!--Link bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.css"
        integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Link font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
    
    
</head>





<body onload="resetTime()">

<!--  -->
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="initial.php">HOME</a> <div id="show"><!-- Aqui renderiza a meta tag refresh que direciona par logoff --></div>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?= $user_name ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="initial.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="newUser.php">Administrador</a>            
            <a class="nav-link" href="newPositions.php">Posições</a>
            <a class="nav-link" href="inserirPalet.php">Alocar Palete</a>
            <a class="nav-link" href="buscarPalet.php">Buscar Palete</a>
            <a class="nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-link" href="config.php ">Cores</a>
            <a class="nav-link" href="getserial.php ">Pesquisar Serial</a>
            <a class="nav-link" href=" paletes.php">Paletes</a>
            <a class="nav-link" href="setpass.php ">Mudar Senha</a>
            <a class="nav-link" href="sobre.php ">Sobre</a>
            <a class="nav-link" href="logout.php">Sair</a>
          </li>
          
        </ul>
      
      </div>
    </div>
  </div>
</nav>
<!--  -->
   
    <?php if (!empty($exibeMensagem['mensage'])): ?>
        <?php $mtop ="style='margin-top: 57px'" ?>
        <div id="winfall" class="<?php echo $exibeMensagem['type']; ?>" <?= $mtop?> >

            <?= $exibeMensagem['mensage'] ?>

        </div>

    <?php endif; ?>