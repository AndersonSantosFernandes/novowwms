<?php
// use FontLib\Table\Table;

include_once("templates/header.php");
include_once("queryeDash.php");
include_once("verify_login.php");
include_once("css/style.php");
include_once("permitions.php");

?>

<div class="container">
    <h1 class="titulo">Dashboard</h1>
    <div class="registration">

        <h3>Índice de ocupação</h3>
        <hr>
        <!-- Dash de ocupação mostrando porcentagem ocupada e livre -->
        <h5>
            <?= $linhasTotais ?> posições cadastradas
        </h5>
        <h5>
            <?= $linhasOcupadas ?> posições ocupadas
        </h5>
        <h5>
            <?= $linhasLivres ?> posições livres
        </h5>
        <hr>
        <div class="ocupation" style="width: 100%; height: 30px; background-color:white ;">
            <div class="ocupacaoIn"
                style="width: <?= $porcentagemOcupação ?>%; height: 100%; background-color: green; text-align: center; color: white; ">
                <strong>
                    <?= number_format($porcentagemOcupação, 2) ?> % de ocupação
                </strong>
            </div>
        </div>
        <hr>
        <div class="ocupation" style="width: 100%; height: 30px; background-color:white ;">
            <div class="ocupacaoIn"
                style="width: <?= $porcentagemLivre ?>%; height: 100%; background-color: green; text-align: center; color: white; ">
                <strong>
                    <?= number_format($porcentagemLivre, 2) ?> % livre
                </strong>
            </div>
        </div>
        <hr>
        <h3>Paletes/Status</h3>


        <?php foreach ($returnStatus as $retStat): ?>
            <?php



            $contStatus = $retStat['status'];
            // Querye que retorna a contagem de determinado item
            $stmtCont = $conn->prepare("SELECT COUNT(*) FROM posicoes WHERE status = :status");
            $stmtCont->bindParam(":status", $contStatus);
            $stmtCont->execute();
            $linhasCont = $stmtCont->fetch(); //Retorna unidades de cada status 
        
            if ($linhasCont['COUNT(*)'] > 0) {//Só retorna se existir algum cadastrado com esse status

                echo $retStat['status'] . '<br>
                <div class="ocupation" style="width: 100%; height: 30px; background-color:white ;">
                    <div class="ocupacaoIn"
                        style="width: ' . $linhasCont['COUNT(*)'] . '%; height: 100%; background-color: green; text-align: center; color: white; ">
                        <strong>
                            ' . $linhasCont['COUNT(*)'] . ' 
                        </strong>
                    </div>
                </div>
                ';
            }
            ?>


        <?php endforeach; ?>

    </div>
</div>
<?php include_once("templates/footer.php") ?>