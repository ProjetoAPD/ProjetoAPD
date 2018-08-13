<?php

require_once ("../model/CrudUsuario.php");
require_once ("../model/CrudCfp.php");
require_once ("../model/CrudPostagem.php");
require_once ("../model/CrudComentario.php");

if (isset($_GET['acao'])){
    switch ($_GET['acao']){

        case "cadastrar":

            if (!isset($_POST['usuario']) OR !isset($_POST['email']) OR !isset($_POST['senha']) OR !isset($_POST['tipo_usuario'])){
                header('Location: ../view/telas/cadastro.php?erro=3');
            }

            $nome = $_POST['usuario'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $tipo_usuario = $_POST['tipo_usuario'];

            if ($tipo_usuario == 3) {
                $c1 = new Usuario($nome, $email, $senha, $tipo_usuario);
                $objusu = new CrudUsuario();
                $objusu->insertUsuario($c1);
                header('Location: ../view/telas/login.php');

            }elseif ($tipo_usuario == 2){
                $nome_registro = $_POST['nome_registro'];
                $registro = $_POST['cfp'];
                $cpf = $_POST['cpf'];

                $c2 = new Cfp($registro, $nome_registro, $cpf);
                $obj = new CrudCfp();
                $a = $obj->verificaCfp($c2);

                if ($a == true){
                    $c1 = new Usuario($nome_registro, $email, $senha, $tipo_usuario);
                    $objusu = new CrudUsuario();
                    $objusu->insertUsuario($c1);
                    header('Location: ../view/telas/login.php');
                }
            }


            break;

        case "delete":
            $c1 = new CrudUsuario();
            $c1->deleteUsuario($_GET['cod_usuario']);

            header('Location: ../view/telas/listausuarios.php');

            break;

        case "login":
            $user = new Usuario(null, $_POST['email'], $_POST['senha']);
            $c1 = new CrudUsuario();
            $c1->loginUsuario($user);

            if ($_SESSION['logado'] == 'sim'){

                header('Location: ../view/telas/index.php');
            }


            break;

        case "excluir":
            $id = $_GET['id'];
            $c1 = new CrudUsuario();
            $c1->deleteUsuario($id);

            session_start();
            session_destroy();
            header('Location: ../view/telas/index.php');

            break;

        case "sair":
            session_start();
            session_destroy();
            header("Location: ../view/telas/index.php");

            break;

        case "alterar":

            $crud = new CrudUsuario();


            $usu = new Usuario($_POST['nome_usuario'],null , $_POST['senha'], null,  $_GET['cod_usuario']);

            print_r($crud->updateUsuario($usu));

          header('Location: ../view/telas/perfil.php');

    }
}



