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
                <!--Envia a cção de inserir um palet na posição-->
                <input type="hidden" name="returnFulName" value="<?= $returnFulName ?>">
                <!--Envia o nome do usuário logado-->
                <input type="hidden" name="estado" value="Ocupado">
                <!--Muda o estado da posição para ocupado-->
                <input type='hidden' name='nameLog' value='<?= $returnFulName ?>'>
                <!---->
                <!-- Select que envia o modelo de equipamento  -->
                <label for="modelo">Modelo</label>
                <select class="puts" name="modelo" id="modelo"
                    title="Se o modelo não estiver aqui, vá para página cadastrar modelos e insira um novo">
                    <option value=""></option>
                    <?php foreach ($returnModel as $retMod): ?>
                        <?php extract($retMod) ?>

                        <option value="<?= $modelo ?>"><?= $modelo ?></option>


                    <?php endforeach; ?>

                </select>

                <!-- Select que envia o status do equipamento -->
                <label for="status">Status</label>
                <select class="puts" name="status" id="status">
                    <option value=""></option>
                    <?php foreach ($returnStatus as $retStatus): ?>
                        <?php extract($retStatus) ?>

                        <option value="<?= $status ?>"><?= $status ?></option>


                    <?php endforeach; ?>
                </select>



                <!-- Envia NF -->
                <label for="nota">NF</label>
                <input class="puts" type="text" name="nota" id="nota" placeholder="Nota fiscal" required>


                <!-- Envia a quantidade a se inserida nopalet -->
                <label for="quantidade">Quqntidade</label>
                <input type="number" name="quantidade" id="quantidade" min="1">


                <!-- Envia o item / modelo -->
                <label for="modeloItem">Item Modelo</label>
                <select class="puts" name="modeloItem" id="modeloItem">

                    <?php // Lista de itens modelo    
                   echo' <option value=""></option>';              
                        foreach ($linhasInformacao as $linhaInformacao) {
                            extract($linhaInformacao);
                            if ($tipo_informacao == "itemModelo") {
                                echo "<option value='" . $informacao . "'>" . $informacao . "</option>";
                            }
                        }
                        ?>
                </select>

                <!-- Envia unidade de medida -->
                <label for="modeloItem">Unidade de medida</label>
                <select class="puts" name="medidaUnidade" id="medidaUnidade">

                    <?php // Lista de itens modelo  
                    echo' <option value=""></option>';                   
                        foreach ($linhasInformacao as $linhaInformacao) {
                            extract($linhaInformacao);
                            if ($tipo_informacao == "unidade") {
                                echo "<option value='" . $informacao . "'>" . $informacao . "</option>";
                            }
                        }
                        ?>
                </select>

                <!-- Envia contratante -->
                <label for="contrat">Contratante</label>
                <select class="puts" name="contrat" id="contrat">

                    <?php // Lista de itens modelo  
                    echo' <option value=""></option>';                   
                        foreach ($linhasInformacao as $linhaInformacao) {
                            extract($linhaInformacao);
                            if ($tipo_informacao == "contratante") {
                                echo "<option value='" . $informacao . "'>" . $informacao . "</option>";
                            }
                        }
                        ?>
                </select>

                <!-- Envia operação -->
                <label for="operat">Operação</label>
                <select class="puts" name="operat" id="operat">

                    <?php // Lista de itens modelo  
                    echo' <option value=""></option>';                   
                        foreach ($linhasInformacao as $linhaInformacao) {
                            extract($linhaInformacao);
                            if ($tipo_informacao == "operacao") {
                                echo "<option value='" . $informacao . "'>" . $informacao . "</option>";
                            }
                        }
                        ?>
                </select>

                <!-- Envia origem-->
                <label for="origem">Origem</label>
                <select class="puts" name="origem" id="origem">

                    <?php // Lista de itens modelo 
                    echo' <option value=""></option>';                    
                        foreach ($linhasInformacao as $linhaInformacao) {
                            extract($linhaInformacao);
                            if ($tipo_informacao == "origem") {
                                echo "<option value='" . $informacao . "'>" . $informacao . "</option>";
                            }
                        }
                        ?>
                </select>

                <!-- Envia destino-->
                <label for="destino">Destino</label>
                <select class="puts" name="destino" id="destino">

                    <?php // Lista de itens modelo 
                    echo' <option value=""></option>';                    
                        foreach ($linhasInformacao as $linhaInformacao) {
                            extract($linhaInformacao);
                            if ($tipo_informacao == "origem") {
                                echo "<option value='" . $informacao . "'>" . $informacao . "</option>";
                            }
                        }
                        ?>
                </select>
                <br>


                <!-- Campo de observação -->
                <label for="observacao">Observação</label>
                <textarea name="observacao" id="observacao" cols="30" rows="3"></textarea>

                <label for="fullPosition">Posições livres</label>
                <!-- Select que exibe todas as posições vazias aptas para alocar palet -->
                <select class="puts" name="fullPosition" id="fullPosition">

                    <?php // Lista de posições livres
                    echo' <option value="">Posições livres</option>';   
                        foreach ($returnPosicoes as $posicoes) {
                            extract($posicoes);
                            if ($estado == "Livre") {
                                echo "<option value='" . $posicao . "'>" . $posicao . " - " . $estado . "</option>
                                
                                ";
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