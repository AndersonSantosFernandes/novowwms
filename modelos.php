<?php
include_once("templates/header.php");
include_once("queryes.php");
include_once("verify_login.php");
include_once("permitions.php");


$editAction = filter_input(INPUT_GET, "editAction");
$tipo = filter_input(INPUT_GET, "tipo");





if ($permC == 1) {
    $stile = "";
} else {
    $stile = "disabled";
}
?>
<div class="container">
    <h1 class="titulo">Edições</h1>
    <div class="registration">
        <?php if ($editAction == "modelo"): ?>
            <table>
                <thead>
                    <th>
                        <h4>Modelo</h4>
                    </th>
                    <th>
                        <h4>Ação</h4>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($returnModel as $retMod): ?>
                        <?php extract($retMod) ?>
                        <tr>
                            <td>

                                <strong> <a href="editModel.php?id_modelo=<?= $id_modelo ?>"> <?= $modelo ?></a></strong>

                            </td>
                            <td>

                                <strong><a href="process.php?id=<?= $id_modelo ?>&action2=delModelo">Deletar Modelo</a></strong>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif ($editAction == "status"): ?>
            <table>
                <thead>
                    <th>
                        <h4>Status</h4>
                    </th>
                    <th>
                        <h4>Ação</h4>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($returnStatus as $retStatus): ?>
                        <?php extract($retStatus) ?>
                        <tr>
                            <td>

                                <strong> <a href="editStatus.php?status_id=<?= $status_id ?>"> <?= $status ?></a></strong>

                            </td>
                            <td>

                                <strong><a href="process.php?id=<?= $status_id ?>&action2=delStatus">Deletar Status</a></strong>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
           <!-- Edição de item modelo -->
                <?php elseif ($editAction == "alocamento"): ?>

                    <form action="editModel.php" method="post">
                        <input type="hidden" name="action" value="editAloc">
                    <select class="puts" name="editAlocamento" id="editAlocamento">
                        <?php foreach ($linhasInformacao as $information): ?>
                            <?php extract($information) ?>

                            <?php if ($tipo_informacao == $tipo): ?>
                                <option value="<?= $informacao_id ?>"> <?= $informacao ?> </option>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </select>
                    <input class="btnModal" type="submit" value="Editar">
                <?php endif; ?>
                
        </form>
    </div>
</div>
<?php include_once("templates/footer.php") ?>