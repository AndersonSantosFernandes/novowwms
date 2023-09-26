<?php
// use FontLib\Table\Table;

include_once("templates/header.php");
include_once("queryeDash.php");
include_once("verify_login.php");
include_once("css/style.php");
include_once("permitions.php");

?>

<div class="container">
    <h1 class="titulo">Log de ações</h1>
    <div class="registration">
            <h3>Relatório geral de movimenteção</h3>
      <table>

            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Ação</th>
                    <th>Modelo</th>
                    <th>Posição</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($returLogUser as $logUres){
                extract($logUres);

                echo "<tr> 

                <td>    ".$usuario."    </td>
                <td>    ".$acao."    </td>
                <td>    ".$modelo."    </td>
                <td>    ".$posicao."    </td>
                <td>    ".invertDate($dataMod)."    </td>

                </tr>";

                }

                ?>

            </tbody>

      </table>

    </div>
</div>
<?php include_once("templates/footer.php") ?>