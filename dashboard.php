<?php
// use FontLib\Table\Table;

include_once("templates/header.php");
include_once("queryeDash.php");
include_once("verify_login.php");

include_once("permitions.php");

//do grafico
$anguloGrafico = 360; //Angulo do gráfico
$totalPosicoes = $linhasUtilizaveis; //Total de posições utilizaveis ocupadas ou livres
$ocupadas = $linhasOcupadas;
$constante = $anguloGrafico / $totalPosicoes; //Constante que multiplica peas posiçõs ocupadas
// $ocupadas = $return; //Posições ocupadas
$porcentagemOcupacao = ($ocupadas / $totalPosicoes) * 100; //Porcentagem de ocupação
$livres = $totalPosicoes - $ocupadas; //Número de posições livres
$anguloOcupacao = $ocupadas * $constante; // Angulo das posições ocupadas.



?>

<style>
    .graficoPizza {
       margin: 0 auto;
        width: 200px;
        height: 200px;
        border-radius: 50%;
       
    }


    .graficoPizza {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #iconeOcupacao{
        width: 15px;
        height: 15px;
        background-color: purple;
    }
    #iconeLivre{
        width: 15px;
        height: 15px;
        background-color: orange;
        
    }
    
</style>

<div class="container">
    <h1 class="titulo">Dashboard</h1>
    <div class="registration">

        <h3>Índice de ocupação</h3>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <!-- Gráfico  -->

                <div class="graficoPizza" style="background-image:conic-gradient(purple 0 <?= $anguloOcupacao ?>deg,orange 0);"> </div>

                <!-- End gráfico -->
            </div>
            <div class="col-md-6">
                <h5>
                    <?= $linhasTotais ?> posições cadastradas
                </h5>
                <h5>
                    <?= $linhasUtilizaveis ?> posições utilizaveis
                </h5>
                <h5>
                    <?= $linhasOcupadas ?> posições ocupadas
                </h5>
                <h5>
                    <?= $linhasLivres ?> posições livres
                </h5>
                <h5>
                    <?= $linhasBloqueados ?> posições Bloqueadas
                </h5>
                <hr>

                <h5> <div id="iconeOcupacao"></div> <?= number_format($porcentagemOcupação, 2) ?> % de ocupação</h5>
                <h5> <div id="iconeLivre"></div> <?= number_format($porcentagemLivre, 2) ?> % de posições livres</h5>
            </div>
        </div>
        <!-- Dash de ocupação mostrando porcentagem ocupada e livre -->

        <hr>


        <!-- <div class="ocupation" style="width: 100%; height: 30px; background-color:white ;">
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
        <hr> -->
        <h3>Paletes/Status</h3>


        <?php foreach ($returnStatus as $retStat): ?>
            <?php



            $contStatus = $retStat['status'];
            // Querye que retorna a contagem de determinado item
            $stmtCont = $conn->prepare("SELECT COUNT(*) FROM posicoes WHERE status = :status");
            $stmtCont->bindParam(":status", $contStatus);
            $stmtCont->execute();
            $linhasCont = $stmtCont->fetch(); //Retorna unidades de cada status 
        
            if ($linhasCont['COUNT(*)'] > 0) { //Só retorna se existir algum cadastrado com esse status
        
                echo $retStat['status'] . '<br>
                <div class="ocupation" style="width: 100%; height: 30px; background-color:white ; text-align: center;">
                <strong>
                ' . $linhasCont['COUNT(*)'] . ' 
            </strong>
                </div>
                ';
            }
            ?>


        <?php endforeach; ?>

    </div>
</div>
<?php include_once("templates/footer.php") ?>