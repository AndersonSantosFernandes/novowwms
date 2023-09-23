<?php
include_once("templates/header.php");
include_once("queryes.php");
include_once("userLogado.php");
include_once("verify_login.php");
include_once("css/style.php");
include_once("permitions.php");

?>

<div class="container">
    <h1 class="titulo">Inserir Pallet</h1>

    <div class="registration">

        <?php if ($permR == 1): ?>

            <!-- Formulário para salvar um pallet em uma posição livre  -->
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="newPallet">
                <input type="hidden" name="returnFulName" value="<?=$returnFulName?>">
                <input type="hidden" name="estado" value="Ocupado">


                <select class="puts" name="modelo" id="modelo" title="Se o modelo não estiver aqui, vá para página cadastrar modelos e insira um novo">
                    <option value=""></option>
                    <?php foreach ($returnModel as $retMod): ?>
                        <?php extract($retMod) ?>

                        <option value="<?= $modelo ?>"><?= $modelo ?></option>


                    <?php endforeach; ?>

                </select>


                   <select class="puts" name="status" id="status">
                        <option value=""></option>
                        <?php foreach ($returnStatus as $retStatus): ?>
                        <?php extract($retStatus) ?>

                        <option value="<?= $status ?>"><?= $status ?></option>


                    <?php endforeach; ?>
                   </select>         
               
               
                <!-- <input class="puts" type="text" name="status" id="status" placeholder="Status " required> -->
               
               
               
               
               
                <input class="puts" type="text" name="nota" id="nota" placeholder="Nota fiscal" required >
                <textarea name="observacao" id="observacao" cols="30" rows="3"></textarea>

                <label for="fullPosition">Posições livres</label>
                <select class="puts" name="fullPosition" id="fullPosition"  >
                   
                    <?php // Lista de posições livres
                        foreach ($returnPosicoes as $posicoes) {
                            extract($posicoes);
                            if ($estado == "Livre") {
                                echo "<option value='" . $posicao . "'>" . $posicao . " - " . $estado . "</option>";
                            }

                        }
                        ?>
                </select>
                <input class='putsBtn' type="submit" value="Alocar Palet">
            </form>
        <?php else: ?>

            <h2>Você não pode alocar pallet no estoque</h2>
        <?php endif; ?>


        <table>


            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Modelo</th>
                    <th>Status</th>
                    <th>Nota fiscal</th>
                    <th>Observação</th>
                    <th>Modificação</th>
                    <th>Usuário</th>
                </tr>
            </thead>
            <tbody>


                <?php
                //Lista mostrando posições ocupadas e seus conteúdos
                foreach ($returnPosicoes as $posicoes) {
                    extract($posicoes);
                    if ($estado == "Ocupado") {
                        // echo $posicao . " - " . $modelo . " - " . $status . " - " . $nota . " - " . $observacao . " - " . invertDate($dataModificacao) . "<br>";
                
                        echo "<tr>
                <td>" . $posicao . "</td>
                <td>" . $modelo . "</td>
                <td>" . $status . "</td>
                <td>" . $nota . "</td>
                <td>" . $observacao . "</td>
                <td>" . invertDate($dataModificacao) . "</td>
                <td>" . $usuario . "</td>
            </tr>";


                    }

                }
 

                ?>

            </tbody>
        </table>
        
    </div>

</div>

<?php include_once("templates/footer.php") ?>