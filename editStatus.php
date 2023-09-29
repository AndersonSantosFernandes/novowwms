<?php
include_once("templates/header.php");
include_once("queryes.php");
include_once("verify_login.php");

include_once("permitions.php");

$status_id = filter_input(INPUT_GET, "status_id");



$stmt = $conn->prepare("SELECT * FROM status_list WHERE status_id = :status_id");
$stmt->bindParam("status_id", $status_id);
$stmt->execute();
$returnStatus = $stmt->fetch(PDO::FETCH_ASSOC);
 
?>
<div class="container">


    <div class="registration">

        <form action="process.php" method="post">
            <input type="hidden" name="action" value="setStatus">
            <input type="hidden" name="status_id" value="<?= $returnStatus['status_id'] ?>">
            <input class="puts" type="text" name="" id="" value="<?= $returnStatus['status_id'] ?>" disabled>
            <input class="puts" type="text" name="status" id="" value="<?= $returnStatus['status'] ?>">
            <input class="btnModal" type="submit" value="Salvar edição">       
        </form>

    </div>
</div>


<?php include_once("templates/footer.php") ?>