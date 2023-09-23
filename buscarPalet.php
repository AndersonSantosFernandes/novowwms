<?php
include_once("templates/header.php");
include_once("queryes.php");
include_once("userLogado.php");
include_once("verify_login.php");
include_once("css/style.php");
include_once("permitions.php");

$buscada = filter_input(INPUT_POST, "buscada");

if ($buscada == null) {

    $stmt = $conn->prepare("SELECT * FROM posicoes");
    $stmt->execute();
    $rowBuscas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $show = "";

} else {

    $stmt = $conn->prepare("SELECT * FROM posicoes WHERE modelo LIKE ? OR nota LIKE ? OR posicao LIKE ? ");
    $stmt->bindValue(1, "%$buscada%");
    $stmt->bindValue(2, "%$buscada%");
    $stmt->bindValue(3, "%$buscada%");
    $stmt->execute();
    $rowBuscas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $rowNumber = $stmt->rowCount();

    if ($rowNumber < 1) {
        $show = "A pesquisa não retornou resultados <br>";
    } else {
        if ($rowNumber == 1) {
            $show = $rowNumber . " Possível resultado encontrado! <br>";
        } else {
            $show = $rowNumber . " Possíveis resultados encontrados! <br>";
        }

    }
}

if ($permD == 1) {
    $btnDel = "";
} else {
    $btnDel = "style='display: none'";
}

?>

<div class="container">
    <h1 class="titulo">Buscar Pallet</h1>

    <div class="registration">


        <form action="" method="post">
            <input class="puts" type="text" name="buscada" id="buscada" autofocus placeholder="Insira modelo ou NF"
                title="Busca por modelo, nota ou posição">
            <input class="putsBtn" type="submit" value="Buscar modelo/nota/posição">
        </form>

        <?=$show?>

        <table>
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Posição</th>
                    <th>Nota fiscal</th>
                    <th>Observação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rowBuscas as $busca): ?>


                    <?php if ($busca['estado'] == "Ocupado"): ?>

                        <tr>
                            <td>
                                <?= $busca['modelo'] ?>
                            </td>
                            <td>
                                <?= $busca['posicao'] ?>
                            </td>
                            <td>
                                <?= $busca['nota'] ?>
                            </td>
                            <td>
                                <?= $busca['observacao'] ?>
                            </td>
                            <td>
                                <?php $vlrPosition = $busca['posicao'] ?>
                                <button <?=$btnDel?> class="btnModal" <?=$btnDel?> onclick="showModal('<?= $vlrPosition ?>','<?=$returnFulName?>')">Desalocar</button>

                                <form action='editPosition.php' method='post'>

                                    <input type='hidden' name='position' value='<?= $busca['posicao'] ?>'>
                                    <input class='btnModal' type='submit' value='Editar'>
                                </form>

                            </td>
                        </tr>
                    <?php endif; ?>

                <?php endforeach; ?>

            </tbody>
        </table>

    </div>

</div>

<div id="modal">
    
</div>
<script>
    function showModal(position, nameFull) {
        var modal = document.getElementById("modal")

        modal.innerHTML =
            `
            <div id="modalIn">
        <p>Desalocar palete na posição<br>${position}?</p>
        <div id="flexModal">
        <form action='process.php' method='post'>
            <input type='hidden' name='action' value='retirarPalet'>
            <input type='hidden' name='estado' value='Livre'>
            <input type='hidden' name='fullPosition' value='${position}'>
            <input type="hidden" name="returnFulName" value="${nameFull}">
            <input class='btnModal' type='submit' value='Desalocar'>
        </form>
        <button class="btnModal" onclick="hideModal()">Cancelar</button>
        </div>
    </div>
        
        `
    }
    function hideModal(position) {
        var modal = document.getElementById("modal")
        modal.innerHTML =`  `
    }
</script>
<?php include_once("templates/footer.php") ?>