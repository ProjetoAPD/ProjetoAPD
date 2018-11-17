<?php

require_once ("../model/CrudUsuario.php");
require_once ("../model/CrudDenuncias.php");

if (isset($_GET['acao'])) {
    switch ($_GET['acao']) {

        case "deleteDenunciaPostagem":

            $cod_denuncia = $_GET['cod_denuncia'];

            $a = new CrudDenuncias();
            $a->deleteDenunciaPostagem($cod_denuncia);

            header('Location: ../view/telas/denuncias.php?mensagem=denPostagemDelete');
            break;

        case "deleteDenunciaComent":

            $cod_denuncia = $_GET['cod_denuncia'];

            $a = new CrudDenuncias();
            $a->deleteDenunciaComent($cod_denuncia);

            header('Location: ../view/telas/denuncias.php?mensagem=denPostagemDelete');
            break;


        case "deleteDenunciaChat":

            $cod_denuncia = $_GET['cod_denuncia'];

            $a = new CrudDenuncias();
            $a->deleteDenunciaChat($cod_denuncia);

            header('Location: ../view/telas/denuncias.php?mensagem=denPostagemDelete');
            break;
    }
}