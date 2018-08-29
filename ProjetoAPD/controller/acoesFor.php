<?php

session_start();

require_once "../model/CrudUsuario.php";
require_once "../model/CrudPostagem.php";
require_once "../model/CrudComentario.php";
require_once "../model/CrudDenuncias.php";


if (isset($_GET['acao'])){
    switch ($_GET['acao']){

        case "postar":

            $titulo = $_POST['titulo'];
            $texto = $_POST['texto'];
            $cod_usuario = $_SESSION['cod_usuario'];


            $pos = new Postagem_forum( $cod_usuario, 1, $texto, $titulo);
            $objpos = new CrudPostagem();
            $objpos->insertPostagem($pos);

            header('Location: ../view/telas/forum.php');
            break;

        case "excluir":

            $cod_postagem = $_GET['cod_postagem'];

            //exclui comentario
            $crudCom = new CrudComentario();
            $crudCom->deleteComentario($cod_postagem);

            //exclui postagem
            $c1 = new CrudPostagem();
            $c1->deletePostagem($cod_postagem);

            header('Location: ../view/telas/forum.php');

            break;

        case "comentar":

            $comentario = $_POST['comentario'];
            $cod_usuario = $_SESSION['cod_usuario'];
            $cod_postagem = $_POST['cod_postagem'];

            //(texto_comentario, postagem_cod_postagem, usuario_cod_usuario)
            $com = new Comentario($comentario, $cod_postagem, $cod_usuario);
            $objcom = new CrudComentario();
            $objcom->insertComentario($com);

            header('Location: ../view/telas/forum.php');
            break;

        case "excluirComent":

            $cod_comentario = $_GET['cod_comentario'];

            $c1 = new CrudComentario();
            $c1->deleteComentario($cod_comentario);

            header('Location: ../view/telas/forum.php');

            break;

        case "denuncia":

            $cod_postagem = $_POST['cod_postagem'];
            $texto = $_POST['texto'];
            $usuario = $_POST['cod_usuario'];

            $denuncia = new Denuncia_forum($texto, $cod_postagem, $usuario, null, null);
            $c1 = new CrudDenuncias();
            $c1->insertDenunciaForum($denuncia);

            header('Location: ../view/telas/forum.php');

            break;
    }
}