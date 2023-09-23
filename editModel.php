<?php
include_once("templates/header.php");
include_once("queryes.php");
include_once("verify_login.php");
include_once("css/style.php");
include_once("permitions.php");

$id_modelo = filter_input(INPUT_GET, "id_modelo");



$stmt = $conn->prepare("SELECT * FROM modelos WHERE id_modelo = :id_modelo");
$stmt->bindParam("id_modelo", $id_modelo);
$stmt->execute();
$returnModelo = $stmt->fetch(PDO::FETCH_ASSOC);
 
?>
<div class="container">


    <div class="registration">

        <form action="process.php" method="post">
            <input type="hidden" name="action" value="setModelo">
            <input type="hidden" name="id_modelo" value="<?= $returnModelo['id_modelo'] ?>">
            <input class="puts" type="text" name="" id="" value="<?= $returnModelo['id_modelo'] ?>" disabled>
            <input class="puts" type="text" name="modelo" id="" value="<?= $returnModelo['modelo'] ?>">
            <input class="btnModal" type="submit" value="Salvar edição">       
        </form>

    </div>
</div>


<?php include_once("templates/footer.php") ?>