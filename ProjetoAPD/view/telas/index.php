<?php

session_start();

require_once("../../model/Usuario.php");
require_once("../../model/CrudUsuario.php");

if (isset($_SESSION['logado'])) {
    $c = new CrudUsuario();
    $user = $c->getUsuario($_SESSION['cod_usuario']);
}

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="assets/images/nome.png">
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>ProjetoAPD</title>

    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="../semantic/dist/semantic.min.js"></script>
    <script src="assets/js.js"></script>


    <script>
        
    </script>
    <script>
        <?php if (isset($_GET['erro']) and $_GET['erro'] == 1) { ?>
            alert("Faça login ou cadastre-se para participar de nosso chat");
        <?php } ?>
    </script>
</head>
<body>


<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
    <a class="active item" href="index.php">Home</a>
    <a class="item" href="chat.php">Chat</a>
    <a class="item" href="forum.php">Fórum</a>
    <a class="item" href="login.php">Login</a>

    <a class="item" href="cadastro.php">Cadastre-se</a>
</div>

<!-- Page Contents -->
<div class="pusher">
    <div class="ui inverted vertical masthead center aligned segment" id="fundoindex">

        <div class="ui container">
            <div class="ui large secondary inverted pointing menu">
                <a class="toc item">
                    <i class="sidebar icon"></i>
                </a>
                <a class="active item" href="index.php">Home</a>
                <a class="item" href="forum.php">Fórum</a>
                <a class="item" href="chat.php">Chat</a>

                <?php if (!isset($_SESSION['logado'])) { ?>

                    <div class="right item">
                        <a class="ui inverted button" href="login.php">Login</a>
                        <a class="ui inverted button" href="cadastro.php">Cadastre-se</a>
                    </div>

                <?php } else { ?>

                    <div class="right item">
                        <h4 id="textin">Olá <?= $user->getNome() ?></h4>

                        <?php if ($user->getCodTipoUsuario() == 1) { ?>
                            <a class="ui inverted button" href="listausuarios.php">Lista de usuários</a>
                        <?php } ?>

                        <a class="ui inverted button" href="perfil.php">Minha conta</a>
                        <a class="ui inverted button" href="../../controller/acoesUsu.php?acao=sair">Sair</a>
                    </div>

                <?php } ?>


            </div>
        </div>

        <div class="ui text container">
            <h1 class="ui inverted header">
                ProjetoAPD
            </h1>
            <h2>Ajuda psicológica online e gratuita!</h2>
        </div>
    </div>

    <div class="center aligned row">
        <?php if (!isset($_SESSION['logado'])) { ?>

            <div id="aviso_nao_logado">
                <br>
                <h1>Faça login ou cadastre-se para participar do nosso chat!</h1>
            </div>

            <?php } else { ?>
                <br>
            <a href="chat.php">
                <div class="ui massive basic violet buttons">
                    <button class="ui button"><?php
                    if ($user->getCodTipoUsuario() != 2) {
                        echo "Fale com um psicólogo";
                    }else{
                        echo "Ajude usuários";
                    } ?></button>
                </div>
            </a>
            <?php
        }
        ?>


        <div class="center aligned row">
            <h4 class="ui horizontal divider"><i class="arrow down icon"></i>Conheça nosso fórum<i class="arrow down icon"></i></h4>
        </div>
        <div id="lforum">


            <div class="ui text container">
                <a href="forum.php">
                    <div class="ui segment">
                        <h3 class="ui header">
                            <i class="users icon"></i>Fórum
                        </h3>
                        <p>Aqui poderá ver debates, publicações e problemas que já foram solucionados ou precisam de
                            soluções. Veja e tente ajudar alguém ou procure alguém que já tenha o mesmo problema que o
                            seu!</p>
                </a>
            </div>
        </div>

<br>
<br>
    </div>

    </div>



<div class="ui inverted vertical footer segment" id="footer">



    <div class="ui internally celled grid middle aligned">
        <div class="row">
            <div class="three wide column">
                <div class="ui tiny image">
                    <img src="assets/images/logo_ifc_branco.png">
                </div>
            </div>

            <div class="ten wide column">
                <h4 class="ui inverted header">ProjetoAPD</h4>
                <p>IFC-Araquari</p>
                <p>2018</p>
            </div>

            <div class="three wide column">
                <p>Guilherme Henrique Boing</p>
                <p>Leonardo Adriano Vieira</p>
                <p>Leonardo Edenir Rodrigues Graciano</p>
            </div>
        </div>
    </div>



</div>

</div>

</body>

</html>
