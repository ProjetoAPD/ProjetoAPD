<?php

session_start();

require_once "../model/CrudUsuario.php";
require_once "../model/CrudMensagem.php";


if (isset($_GET['acao'])){
    switch ($_GET['acao']) {

        case "enviar":

            $mensagem = $_POST['mensagem'];
            $usuario1 = $_SESSION['cod_usuario'];
            $usuario2 = $_POST['usuario2'];

            $c1 = new Mensagem($usuario1, $usuario2, $mensagem);
            $obj = new CrudMensagem();
            $obj->insertMensagem($c1);

            header("Location: ../view/telas/chat.php?usuario2=$usuario2");

            break;

        case "a":
            break;



    }
}