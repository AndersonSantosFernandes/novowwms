<?php

include_once("queryes.php");
include_once("verify_login.php");
 
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        border-radius: 5px;
        box-shadow: 3px,3px,3px var(--standard-color);
    }

    :root {
        --standard-color: gray;
        --background: white;
        --title-color:<?= $lineColor["fontColor"] ?>;
        --bg-title-color:<?= $lineColor["color"] ?>;
        --colorRow:<?= $lineColor["colorRow"] ?>;
        --colorBox:<?= $lineColor["colorBox"] ?>;
        --btnMain:<?= $lineColor["btnMain"] ?>;


        /* --title-color cor da fonte na header */
        /* --bg-title-color cor principal */
        /* --colorRow cor da caixa principal */
        /* --colorBox  cor da box de cada video */
        /* --btnMain:cor dos botões maiores */

        /*Background images */
        --bgImage: url("imgs/<?= $lineColor['backgroundImage'] ?>.png");
    }

    body {

        <?php if (isset($_SESSION["user"]) ): ?>
            background-image: var(--bgImage);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        <?php else: ?>
            background-image: url("imgs/default.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        <?php endif; ?>
    }

    .container {
        /* position: relative; */
    }

    /*Modal deletar vídeo*/


   #modal{
    position: fixed;
    left: 50%;
    top: 200px;
   }
    


    #modalIn {
        width: 300px;
        height: 160px;
        border: 1px solid var(--bg-title-color);
        background-image: linear-gradient(aqua, white);
        position: absolute;
        top: 100px;
        left: 50%;
        margin-left: -150px;
        border-radius: 10px;
    }

    #modalIn p{
        background-color: var(--bg-title-color);
        color: var(--title-color);
        text-align: center;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        height: 60px;
        margin-bottom: 30px;
        font-weight: bold;
    }
    #flexModal{
        display: flex;
        justify-content: space-around ;
        align-items: center;
    }
    button a{
        color: var(--colorBox);
    }
    button a:hover{
        color: var(--title-color);
        text-decoration: none;
    }

    .btnModal {
        width: 120px;
        padding: 5px;
        margin: 8px;
        border-radius: 8px;
        color: var(--colorBox);
        font-weight: bold;
        transition: all 1s;
    }
    .btnModal:hover{
        background-color: var(--bg-title-color);
        color: var(--title-color);
    }

    .gr {
        background-image: radial-gradient(#88f7a4, black);
    }

    .rd {
        background-image: radial-gradient(#f9a4a4, black);
    }

    /*instruct.php */
    .images {
        width: 400px;
        height: 250px;
    }

    .imgrow {
        margin-top: 25px;
        background-color: rgba(255, 255, 255, .8);
        padding: 10px 0;
    }

    /*header*/
    header { 
        position: sticky ;
        top: 0px;
        width: 100%;
        /* background-color: var(--bg-title-color); */
        background-image: linear-gradient(var(--bg-title-color),var(--bg-title-color), white,var(--bg-title-color), var(--bg-title-color));
        padding: 5px 0;
        text-align: center;
        z-index: 100;
        /* margin-bottom: 10px; */

        /* vertical-align: middle; */

    }

    header nav ul li a {
        color: var(--title-color);
        font-size: 25px;
        text-decoration: none;
        margin: 0 20px;
        font-weight: bold;
        transition: all 1s;
    }

    header nav ul li a:hover {
        color: var(--title-color);
        /* font-size: 26px; */
        text-decoration: none;
        text-shadow: 0 0 5px var(--title-color);
    }

    #ins {
        color: var(--title-color);
    }

    /* .proc {
        border-radius: 5px;
        height: 30px;
        padding: 5px;
    }

    .btnproc {
        width: 30px;
        height: 30px;
        border-radius: 5px;
    } */

    /*Coments.php */

    /* .nomeFilme {
        font-weight: bold;
        font-size: 22px;
    } */

    /*warning-message*/
    .win {
        width: 90%;
        text-align: center;
        background-color: rgb(159, 237, 159);
        padding: 5px 0;
        border: 1px solid rgb(5, 173, 5);
        color: rgb(5, 173, 5);
        font-weight: bold;
        margin: 5px auto;
    }

    .fall {
        width: 90%;
        text-align: center;
        background-color: rgb(253, 183, 183);
        padding: 5px 0;
        border: 1px solid rgb(214, 9, 9);
        color: rgb(214, 9, 9);
        font-weight: bold;
        margin: 5px auto;
    }

    /* links csv pagina newPosition */

.csvLink{
    width: 100%;
    height: 50px;
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.csvLink i a{
color: var(--title-color);
font-family: Arial, Helvetica, sans-serif;
}
/* grafico pizza */
.graficoPizza {
       margin: 0 auto;
        width: 200px;
        height: 200px;
        border-radius: 50%;
       
    }


    .graficoPizza {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    /*user_manage*/
    table {
        width: 100%;
        border: 1px solid var(--standard-color);
    }

    table td,
    table th {
        padding: 3px 2px;
        border: 1px solid var(--standard-color);
    }

    .red {
        background-color: rgb(228, 92, 92);
    }

    .green {
        background-color: rgb(95, 218, 95);
    }

    /* Tabela com inputs alocar palet */
    #tbInsert{
        padding: 3px;
        border-collapse: separate ;

    }
    /*index*/
    h1 {
        text-align: center;
        background-color: aliceblue;
        opacity: .7;
        margin-top: 10px;
    }


    /*initial.php*/
    .act {
        height: 150px;
        /* border: 1px solid var(--standard-color); */
        /* background-color: var(--background); */
        /* opacity: .7; */
        text-align: center;
        padding-top: 12px;
    }

    .btn-actions {
        width: 90%;
        height: 90%;
        border: none;
        /* background-color: var(--btnMain); */
        background-image: linear-gradient( var(--btnMain),white, var(--btnMain));
        box-shadow: inset 0 0 12px var(--standard-color);
        border-radius: 15px;
        font-weight: bold;
        font-size: 26px;
        transition: all 1s;
    }

    .btn-actions:hover {
        box-shadow: inset 0 0 50px var(--bg-title-color);
    }

    /*newUser*/
    .registration {
        border: 1px solid var(--standard-color);
        margin: 30px auto;
        background-color: var(--colorRow); 
        padding: 10px;
        opacity: 0.9;
    }

    .form-cad {
        text-align: center;
    }

    .puts {
        width: 300px;
        margin-bottom: 18px;
        border-radius: 6px;
        border: none;
        background-color: white;
        padding: 3px;
    }

    .putsBtn {
        width: 300px;
        margin: 15px auto;
        border-radius: 6px;
        border: none;
        background-color: var(--btnMain);
        padding: 3px;
        font-weight: bold;
    }

    .permiton-check {
        border: 1px solid var(--standard-color);
    }

    /*my.php */


    /* .public {
        background-color: #82ec65;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        color: #229e00;
        font-size: 18px;
        font-weight: bold;
        height: 30px;
    } */

    .private {
        background-color: #fba2a2;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        color: #f32b2b;
        font-size: 18px;
        font-weight: bold;
        height: 30px;
    }

    /*all.php*/
    .mov {
        border: 1px solid var(--bg-title-color);
        margin: 10px 16px;
        height: 300px;
        text-align: center;
        background-image: linear-gradient(white, var(--colorBox));
        border-radius: 8px;
    }

    .movAll {
        height: 200px;
    }

    .title {
        width: 90%;
        height: 130px;
        font-weight: bold;
        padding-top: 5px;
    }

    .userEmail {
        font-size: 13px;
        font-weight: bold;
        transition: all 1s;
    }

    .userEmail:hover {
        transform: scale(1, 2);
    }

    .btnDiv {
        width: 90%;
        padding: 5px;
        background-color: var(--bg-title-color);
        margin: 5 auto;
        border-radius: 5px;
        color: var(--title-color);
        font-weight: bold;
        border: none;
    }

    .btnDiv a {
        color: var(--title-color);
        font-size: 18px;
        font-weight: bold;
    }

    textarea {
        width: 100%;
        margin: 5px auto;
        padding: 5px;
    }

    iframe {
        width: 100%;
        margin-bottom: 10px;
    }

    /*play.php*/
    .tit {
        background-color: aliceblue;
        /* opacity: .8; */
        padding: 10px 10px;
        margin-bottom: 20px;
    }

    .down {
        border-bottom: 2px solid var(--bg-title-color);
    }

    /* permition edit */

    .checkbx{
        display: flex;
        justify-content: space-around;
    }

    @media(max-width:450px) {
        .movAll {
            height: 200px;
        }

        .login {
            margin: 0 auto;
            padding: 4px;
        }

        .in {
            padding: 6px;
        }


        .btn-actions {
            height: 99%;
        }

        .act {
            height: 50px;
        }

        body {
            background-position: center;
        }

        header nav ul li a {
            font-size: 15px;
        }

        .titulo {
            font-size: 25px;
            width: 100%;
        }

        .down {
            width: 98%;
            margin: 0 auto;
        }

        .down h5 {
            font-size: 15px;
        }

        .mov {
            background-image: linear-gradient(white, var(--colorBox));
        }

        .hide {
            display: none;
        }

        .registration {
            margin-bottom: 35px;
            
        }

        .images {
            width: 100%;
        }

        #modal {
            height: 200px;
            text-align: center;
        }

    }
</style>