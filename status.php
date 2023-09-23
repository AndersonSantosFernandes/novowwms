<?php
include_once("templates/header.php");
include_once("queryes.php");
include_once("verify_login.php");
include_once("css/style.php");
include_once("permitions.php");
if ($permC == 1) {
    $stile = "";
} else {
    $stile = "disabled";
}
?>

<div class="container">
    <h1 class="titulo">Cadastrar status</h1>

    <div class="registration">

        <form action="process.php" method="post">
            <input type="hidden" name="action" value="cadStatus">

            <label for="status">Digite novo status</label>

            <input <?= $stile ?> class="puts" type="text" name="status" id="" autofocus>

            <input class="putsBtn" type="submit" value="Salvar status">
        </form>
    </div>
    <hr>
    <div class="registration">
        <?php if ($permU == 1): ?>
            <h3>Toque para editar</h3>
        <?php else: ?>
            <h3>Edição bloqueada</h3>
        <?php endif; ?>

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
                            <?php if ($permU == 1): ?>
                                <strong> <a href="editStatus.php?status_id=<?= $status_id ?>"> <?= $status ?></a></strong>
                            <?php else: ?>
                                <strong> <a>
                                        <?= $status ?>
                                    </a></strong>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($permD == 1): ?>
                                <strong><a href="process.php?id=<?= $status_id ?>&action2=delStatus">Deletar Status</a></strong>

                            <?php else: ?>
                                <strong><a>Deletar Bloqueado</a></strong>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once("templates/footer.php") ?>