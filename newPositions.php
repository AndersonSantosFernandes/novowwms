<?php
// use FontLib\Table\Table;

include_once("templates/header.php");
include_once("queryes.php");
include_once("verify_login.php");
include_once("permitions.php");
?>

<div class="container">
    <h1 class="titulo">Posições</h1>
    <div class="registration">

       
        <div class="csvLink">
            <i class="fa-solid fa-file-excel"><a class="linkCsv" href="csv.php?estado=ocupado"> CSV posicoes
                    ocupadas</a></i>
            <i class="fa-solid fa-file-excel"><a class="linkCsv" href="csv.php?estado=livre"> CSV posicoes
                    livres</a></i>

            <i class="fa-solid fa-file-excel"><a class="linkCsv" href="csv.php?estado=todas"> CSV todas posicoes</a></i>
        </div>


        <table>
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Estado</th>
                    <th>Data Mov</th>
                    <th>Usuário</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($returnPosicoes as $posicoes) {
                    extract($posicoes);


                    echo "
                
                <tr>
                    <td>" . $posicao . "</td>
                    <td>" . $estado . "</td>
                    <td>" . invertDate($dataModificacao) . "</td>
                    <td>" . $usuario . "</td>
                </tr>
                
                ";
                }

                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once("templates/footer.php") ?>