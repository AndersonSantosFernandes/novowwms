<?php include_once("templates/header.php");
include_once("verify_login.php");
include_once("css/style.php");
include_once("permitions.php");


?>

<div class="container">
    <h1 class="titulo" >Controle de Estoque</h1>

   
    <div class="row init">
        
        <div class="col-md-4 act">
        <a href="newUser.php"><button class="btn-actions">Cadastrar usuário</button>
        </div>
        <div class="col-md-4 act">
        <a href="modelos.php"><button class="btn-actions">Cadastrar modelos</button>
        </div>
        <div class="col-md-4 act">
        <a href="config.php"><button class="btn-actions">Configurar cores</button>
        </div>
        
    </div>
    <div class="row init">
        <div class="col-md-4 act">
        <a href="newPositions.php"><button class="btn-actions">Cadastrar Posições</button>
        </div>
        <div class="col-md-4 act">
        <a href="buscarPalet.php"><button class="btn-actions">Buscar Pallet</button>
        </div>
        <div class="col-md-4 act">
        <a href="status.php"><button class="btn-actions">Cadastrar Status</button>
        </div>
    </div>

    <div class="row init">
        <div class="col-md-4 act">
        <a href="inserirPalet.php"><button class="btn-actions">Alocar Pallet</button>
        </div>
        <div class="col-md-4 act">
        <a href=""><button class="btn-actions">Desenvolvendo</button>
        </div>  
        <div class="col-md-4 act">
            <a href="setpass.php"><button class="btn-actions">Alterar Senha</button>
        </div>        
    </div>
   
   
</div>

<?php include_once("templates/footer.php") ?>