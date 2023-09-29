<?php

include_once("conexao.php");
include_once("models/Message.php");

$mensagens = new Message();

//Imput principal que recebe as ações de cada formulário (input hiden).
$action = filter_input(INPUT_POST, "action");

//Inputs que vem por GET
$action2 = filter_input(INPUT_GET, "action2");
$id = filter_input(INPUT_GET, "id");

//Inputs vindos de formulários:
$rua = filter_input(INPUT_POST, "rua");
$posicao = filter_input(INPUT_POST, "posicao");
$altura = filter_input(INPUT_POST, "altura");
$profundidade = filter_input(INPUT_POST, "profundidade");

//Vem da inserção de pallet
$modelo = filter_input(INPUT_POST, "modelo");
$status = filter_input(INPUT_POST, "status");
$nota = filter_input(INPUT_POST, "nota");
$quantidade = filter_input(INPUT_POST, "quantidade");
$modeloItem = filter_input(INPUT_POST, "modeloItem");
$medidaUnidade = filter_input(INPUT_POST, "medidaUnidade");
$contrat = filter_input(INPUT_POST, "contrat");
$operat = filter_input(INPUT_POST, "operat");
$origem = filter_input(INPUT_POST, "origem");
$destino = filter_input(INPUT_POST, "destino");
$observacao = filter_input(INPUT_POST, "observacao");
$estado = filter_input(INPUT_POST, "estado");
$fullPosition = filter_input(INPUT_POST, "fullPosition");
$returnFulName = filter_input(INPUT_POST, "returnFulName");
$direction = filter_input(INPUT_POST, "direcao");

//Gerenciamento de permissões
$admin = filter_input(INPUT_POST, "admin");
$create = filter_input(INPUT_POST, "create");
$read = filter_input(INPUT_POST, "read");
$update = filter_input(INPUT_POST, "update");
$delete = filter_input(INPUT_POST, "delete");
$email = filter_input(INPUT_POST, "email");

// Para cadastrar novo usuário ou alterar senha
$name = filter_input(INPUT_POST, "name");
$lastName = filter_input(INPUT_POST, "lastName");
$password = filter_input(INPUT_POST, "password");
$confirmPassword = filter_input(INPUT_POST, "confirmPassword");

// Para editar cores
$color = filter_input(INPUT_POST, "color");
$fontColor = filter_input(INPUT_POST, "fontColor");
$colorRow = filter_input(INPUT_POST, "colorRow");
$colorBox = filter_input(INPUT_POST, "colorBox");
$btnMain = filter_input(INPUT_POST, "btnMain");

// Cadastrar novo modelo
$cadNewModel = filter_input(INPUT_POST, "nomeModelo");

$id_modelo = filter_input(INPUT_POST, "id_modelo");//recebe posicao_id em outro processamento
$status_id = filter_input(INPUT_POST, "status_id");


//Tras informações para alocamento de palet. Vem da página newUser.php
$informacaoTipo = filter_input(INPUT_POST, "informacaoTipo");
$information = filter_input(INPUT_POST, "information");





if ($admin == null) {
    $padm = 0;
} else {
    $padm = 1;
}
if ($create == null) {
    $pcreate = 0;
} else {
    $pcreate = 1;
}
if ($read == null) {
    $pread = 0;
} else {
    $pread = 1;
}
if ($update == null) {
    $pupdate = 0;
} else {
    $pupdate = 1;
}
if ($delete == null) {
    $pdelete = 0;
} else {
    $pdelete = 1;
}

function number($num) // Função acrescenta um zero a esquerda se o valor for menor que dez
{
    if ($num < 10) {
        return $num = "0" . $num;
    } else {
        return $num;
    }
}

if ($action === "novaPosicao") {
    // Verifica se estão vindo todas as informaç~es dos inputs
    if ($rua && $posicao && $altura && $profundidade) {
        $newPosition = number($rua) . "-" . number($posicao) . "-" . number($altura) . "-" . $profundidade;

        //Esta querye de validação impede duplicidade de posições
        $confimaPosicao = $conn->prepare("SELECT * FROM posicoes WHERE posicao = :posicao");
        $confimaPosicao->bindParam(":posicao", $newPosition);
        $confimaPosicao->execute();
        $rowConfirmPos = $confimaPosicao->rowCount();


        // Ao salvar, se já existir a posição salva não é gravada novamente
        if ($rowConfirmPos > 0) {
            $mensagens->setMessage("Esta posição já existe !!!", "fall");
        } else {
            $stmt = $conn->prepare("INSERT into posicoes (posicao,estado) VALUES (:posicao, 'Livre' ) ");
            $stmt->bindParam(":posicao", $newPosition);
            $stmt->execute();

            $mensagens->setMessage("Posição " . $newPosition . " cadastrada com sucesso!!!", "win");

        }


    }

    header("location:newPositions.php");

} elseif ($action == "newPallet") { //Query que salva um pallet na posição

   

    

    if ($modelo && $status && $fullPosition) {
        $stmt = $conn->prepare("UPDATE posicoes SET  modelo = :modelo, status = :status, 
        nota = :nota, quantidade = :quantidade, itemModelo = :itemModelo,
        unudMedida = :unudMedida, contratante = :contratante, operacao = :operacao,
        origem = :origem, destino = :destino, observacao = :observacao, estado = :estado, 
        dataModificacao = CURRENT_DATE, usuario = :usuario WHERE posicao = :posicao");
        $stmt->bindParam(":modelo", $modelo);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":nota", $nota);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":itemModelo", $modeloItem);
        $stmt->bindParam(":unudMedida", $medidaUnidade);
        $stmt->bindParam(":contratante", $contrat);
        $stmt->bindParam(":operacao", $operat);
        $stmt->bindParam(":origem", $origem);
        $stmt->bindParam(":destino", $destino);
        $stmt->bindParam(":observacao", $observacao);
        $stmt->bindParam(":estado", $estado);
        $stmt->bindParam(":usuario", $returnFulName);
        $stmt->bindParam(":posicao", $fullPosition);
        $stmt->execute();

        $mensagens->setMessage("Salvo com sucesso !!!", "win");

        if ($direction == "editado") {
            header("location:buscarPalet.php");
        } else {
            header("location:inserirPalet.php");
        }
    } else {
        $mensagens->setMessage("Preencha todos os campos obrigatórios", "fall");
        header("location:inserirPalet.php");
    }



} elseif ($action == "retirarPalet") {

   
    $stmt = $conn->prepare("UPDATE posicoes SET  modelo = '', status = '', 
        nota = '', quantidade = 0, itemModelo = '', unudMedida = '', contratante = '', operacao = '',
        origem = '', destino = '', observacao = '', estado = :estado, 
        dataModificacao = CURRENT_DATE, usuario = :usuario WHERE posicao = :posicao");
   
    $stmt->bindParam(":estado", $estado);
    $stmt->bindParam(":posicao", $fullPosition);
    $stmt->bindParam("usuario", $returnFulName);
    $stmt->execute();


   

    $mensagens->setMessage("Pallet desalocado com sucesso !!!", "win");
    header("location:buscarPalet.php");
} elseif ($action === "update-permitions") { //Query para alteração 

    $stmt = $conn->prepare("UPDATE users SET admin = :admin, permitionC = :create, permitionR = :read, permitionU = :update, permitionD = :delete   WHERE email =:email");

    $stmt->bindParam(":admin", $padm);
    $stmt->bindParam(":create", $pcreate);
    $stmt->bindParam(":read", $pread);
    $stmt->bindParam(":update", $pupdate);
    $stmt->bindParam(":delete", $pdelete);
    $stmt->bindParam(":email", $email);

    $stmt->execute();

    $mensagens->setMessage("Permissões alteradas com sucesso <a href=''>X</a>", "win");
    header("location:user_manage.php");
} elseif ($action === "create") { //Query para inserção de usuários
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $mensagens->setMessage("O email " . $email . " já está em uso. Tente com outro <a href=''>X</a>", "fall");
    } else {

        if ($name && $lastName && $email && $password) {

            if ($password === $confirmPassword) {

                $stmt = $conn->prepare("INSERT INTO users(name, lastName, email, pass, admin, permitionC, permitionR, permitionU, permitionD, inputDate, color, fontColor, colorRow, colorBox, btnMain, backgroundImage)
            VALUES(:name, :lastName,  :email, md5(:pass),  :admin,  :permitionC, :permitionR,  :permitionU,  :permitionD, CURRENT_DATE, '#002afa', '#fafafa', '#fafafa', '#f56e00', '#fafafa','default');");

                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":lastName", $lastName);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":pass", $password);
                $stmt->bindParam(":admin", $padm);
                $stmt->bindParam(":permitionC", $pcreate);
                $stmt->bindParam(":permitionR", $pread);
                $stmt->bindParam(":permitionU", $pupdate);
                $stmt->bindParam(":permitionD", $pdelete);

                $stmt->execute();

                $mensagens->setMessage("show muleque <a href=''>X</a>", "win");
            } else {
                $mensagens->setMessage("As senhas não sao iguais ainda <a href=''>X</a>", "fall");
            }
        } else {
            $mensagens->setMessage("Preencha todos os campos <a href=''>X</a>", "fall");
        }
    }
    header("location:newUser.php");
} elseif ($action == "setColor") { //Query para mudança de cores



    $stmtColor = $conn->prepare("UPDATE users SET color = :color, fontColor = :fontColor, colorRow = :colorRow, colorBox = :colorBox, btnMain = :btnMain  WHERE email = :email");
    $stmtColor->bindParam(":color", $color);
    $stmtColor->bindParam("fontColor", $fontColor);
    $stmtColor->bindParam("colorRow", $colorRow);
    $stmtColor->bindParam("colorBox", $colorBox);
    $stmtColor->bindParam(":btnMain", $btnMain);
    $stmtColor->bindParam(":email", $email);

    $stmtColor->execute();

    $mensagens->setMessage("Cores alteradas com sucesso  <a href=''>X</a>", "win");
    header("location:config.php");
} elseif ($action === "update-pass") {

    if ($password === $confirmPassword) {

        $stmt = $conn->prepare("UPDATE users SET pass = md5(:pass) WHERE email = :email ");
        $stmt->bindParam(":pass", $password);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $mensagens->setMessage("Senha alterada com sucesso!", "win");
    } else {
        $mensagens->setMessage("Senhas não batem ou preenchimento incorreto", "fall");
    }

    header("location:setpass.php");

} elseif ($action === "cadModelo") {

    if (strlen($cadNewModel) > 5) {
        $stmt = $conn->prepare("INSERT INTO modelos (modelo) VALUES (:modelo)");
        $stmt->bindParam(":modelo", $cadNewModel);
        $stmt->execute();

        $mensagens->setMessage("O modelo " . $cadNewModel . " foi cadastrado com sucesso!", "win");

    } else {
        $mensagens->setMessage("Preencha o campo corretamente", "fall");

    }

    header("location:newUser.php");
} elseif ($action == "setModelo") {

    $stmt = $conn->prepare("UPDATE modelos SET modelo = :modelo WHERE id_modelo = :id_modelo");
    $stmt->bindParam(":modelo", $modelo);
    $stmt->bindParam(":id_modelo", $id_modelo);
    $stmt->execute();

    $mensagens->setMessage("Alterado com cucesso para <strong>" . $modelo . "!</strong>", "win");

    header("location:modelos.php");

} elseif ($action2 == "delModelo") {

    $stmt = $conn->prepare("DELETE FROM modelos WHERE id_modelo = :id_modelo");
    $stmt->bindParam(":id_modelo", $id);
    $stmt->execute();

    $mensagens->setMessage("Deletado com sucesso!", "win");

    header("location:modelos.php");

} elseif ($action == "cadStatus") {

    if (strlen($status) > 3) {
        $stmt = $conn->prepare("INSERT INTO status_list (status) VALUES (:status)");
        $stmt->bindParam(":status", $status);
        $stmt->execute();

        $mensagens->setMessage("O status " . $status . " foi cadastrado com sucesso!", "win");

    } else {
        $mensagens->setMessage("Preencha o campo corretamente", "fall");

    }

    header("location:newUser.php");

} elseif ($action2 == "delStatus") {

    $stmt = $conn->prepare("DELETE FROM status_list WHERE status_id = :status_id");
    $stmt->bindParam(":status_id", $id);
    $stmt->execute();

    $mensagens->setMessage("Deletado com sucesso!", "win");

    header("location:status.php");

} elseif ($action == "setStatus") {

    $stmt = $conn->prepare("UPDATE status_list SET status = :status WHERE status_id = :status_id");
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":status_id", $status_id);
    $stmt->execute();

    $mensagens->setMessage("Alterado com cucesso para <strong>" . $status . "!</strong>", "win");

    header("location:status.php");

}elseif($action == "salvarInformacao"){

if($information){

    $informationUpper = strtoupper($information);//Transforma a string toa em maiúscula.

    $stmt = $conn->prepare("INSERT INTO listainformacoescadastrar(tipo_informacao,informacao)
    VALUES(:tipo_informacao,:informacao)
    ");
    $stmt->bindParam(":tipo_informacao",$informacaoTipo);
    $stmt->bindParam(":informacao",$informationUpper);
    $stmt->execute();


    $mensagens->setMessage($informationUpper . " adicionado com cucesso <strong>!</strong>", "win");
    
}else{


    $mensagens->setMessage("Preencah o campo corretamente</strong>", "fall");
}

header("location:newUser.php");
}elseif($action == "editInfAloc"){
// echo $id_modelo . "<br>" . $informacaoTipo . "<br>" . $information;
$modeloUp = strtoupper($id_modelo);
$stmt = $conn->prepare("UPDATE listainformacoescadastrar SET tipo_informacao = :tipo_informacao , informacao = :informacao WHERE informacao_id = :informacao_id");
$stmt->bindParam(":tipo_informacao",$informacaoTipo);
$stmt->bindParam(":informacao",$information);
$stmt->bindParam(":informacao_id", $modeloUp);
$stmt->execute();

$mensagens->setMessage("Alterado com sucesso para " .$information. " <strong>!</strong>", "win");

header("location:newUser.php");

}elseif($action == "bloquearPosicao"){

    if($id_modelo){

        $stmt = $conn->prepare("UPDATE posicoes SET estado = :estado WHERE posicao_id = :posicao_id");
        $stmt->bindParam(":estado",$estado);
        $stmt->bindParam(":posicao_id",$id_modelo);
        $stmt->execute();
        
        $mensagens->setMessage("Posição está ".$estado,"win");

    }else{
        $mensagens->setMessage("Selecione uma opção na lista","fall");
    }

header("location:newUser.php");

}




?>