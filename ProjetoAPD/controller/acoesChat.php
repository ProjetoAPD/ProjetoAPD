<?php

session_start();

require_once "../model/CrudUsuario.php";
require_once "../model/CrudMensagem.php";
require_once "../model/CrudDenuncias.php";



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

        case "denuncia":

           $cod_mensagem = $_GET['cod_mensagem'];
           $usuarioDenunciado = $_GET['cod_usuario'];

            $a = new CrudDenuncias();
            $mensagem = $a->getMensagemDenChat($cod_mensagem);

            $c1 = new Denuncia_chat($mensagem, $cod_mensagem, $usuarioDenunciado);
            $a->insertDenunciaChat($c1);

            header("Location: ../view/telas/chat.php?mensagem=denunciado&usuario2=$usuarioDenunciado");

            break;
    }
}