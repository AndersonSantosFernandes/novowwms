<?php
include_once("global.php");
class Message
{

    public function setMessage($mensagens, $type)
    {
        $_SESSION["mensage"] = $mensagens;
        $_SESSION["type"] = $type;

    }

    public function getMessage() 
    {

        if (!empty($_SESSION["mensage"])) {
            return [
                "mensage" => $_SESSION["mensage"],
                "type" => $_SESSION["type"]

            ];
        } else {
            return false;
        }

    }

    public function clearMessage()
    {
        $_SESSION["mensage"] = "";
        $_SESSION["type"] = "";

    }



    /**
     */
    public function __construct() {
    }
}


?>