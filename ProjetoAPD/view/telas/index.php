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


    <style type="text/css">

        .ui.button{
            background-color: #4C2C63;
        }


        .hidden.menu {
            display: none;
        }
        .masthead.segment {
            min-height: 500px;
            padding: 1em 0em;
        }
        .masthead .logo.item img {
            margin-right: 1em;
        }
        .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
        }
        .masthead h1.ui.header {
            margin-top: 15%;
            margin-bottom: 0em;
            font-size: 4em;
            font-weight: normal;
        }
        .masthead h2 {
            font-size: 1.7em;
            font-weight: normal;
        }
        .ui.vertical.stripe {
            padding: 8em 0em;
        }
        .ui.vertical.stripe h3 {
            font-size: 2em;
        }
        .ui.vertical.stripe .button + h3,
        .ui.vertical.stripe p + h3 {
            margin-top: 3em;
        }
        .ui.vertical.stripe .floated.image {
            clear: both;
        }
        .ui.vertical.stripe p {
            font-size: 1.33em;
        }
        .ui.vertical.stripe button {
            width: 20em;
            height: 5em;
        }
        .ui.vertical.stripe .horizontal.divider {
            margin: 3em 0em;
        }
        .quote.stripe.segment {
            padding: 0em;
        }
        .quote.stripe.segment .grid .column {
            padding-top: 5em;
            padding-bottom: 5em;
        }
        .footer.segment {
            padding: 5em 0em;
        }
        .secondary.pointing.menu .toc.item {
            display: none;
        }
        .link {
            color: black;
        }
        .ui.inverted.vertical.masthead.center.aligned.segment {
            background-color: #4C2C63;
        }
        .ui.inverted.vertical.footer.segment {
            background-color: #4C2C63;
        }
        .center.aligned.row {
            padding:1% 0%;
            text-align: center;
            background-color:#fff;
            margin-top: 20px;
        }

        @media only screen and (max-width: 700px) {
            .ui.fixed.menu {
                display: none !important;
            }
            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
                display: none;
            }
            .secondary.pointing.menu .toc.item {
                display: block;
            }
            .masthead.segment {
                min-height: 350px;
            }
            .masthead h1.ui.header {
                font-size: 2em;
                margin-top: 1.5em;
            }
            .masthead h2 {
                margin-top: 0.5em;
                font-size: 1.5em;
            }
        }
    </style>


    <script src="assets/library/jquery.min.js"></script>
    <script src="../semantic/dist/components/visibility.js"></script>
    <script src="../semantic/dist/components/sidebar.js"></script>
    <script src="../semantic/dist/components/transition.js"></script>
    <script>
        $(document)
            .ready(function () {

                // fix menu when passed
                $('.masthead')
                    .visibility({
                        once: false,
                        onBottomPassed: function () {
                            $('.fixed.menu').transition('fade in');
                        },
                        onBottomPassedReverse: function () {
                            $('.fixed.menu').transition('fade out');
                        }
                    })
                ;

                // create sidebar and attach to menu open
                $('.ui.sidebar')
                    .sidebar('attach events', '.toc.item')
                ;

            })
        ;
    </script>
</head>
<body>
<!---->
<?php
//if (isset($_GET['erro'])){
//    if ($_GET['erro'] == 'naologado'){
//        alerta();
//    }
//}   ?>

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
    <div class="ui inverted vertical masthead center aligned segment">

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
                        <p>Olá <?= $user->getNome() ?></p>

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
            <h2>Ajuda psicológica online e de graça!</h2>
        </div>

    </div>

    <div class="center aligned row">
        <?php
        if (!isset($_SESSION['logado'])) {
            ?>


            <div id="aviso_nao_logado">
                <h1>Faça login ou cadastre-se para participar do nosso chat!</h1>
            </div>

            <?php
        } else {
            ?>
            <a href="chat.php">
                <div class="ui massive purple buttons">
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


    </div>

    </div>



<h4 class="ui horizontal header divider">
    <a href="#">Voltar ao topo</a>
</h4>


<div class="ui inverted vertical footer segment">
    <div class="ui container">
        <div class="ui stackable inverted divided equal height stackable grid">

            <div class="four wide column">

                <div class="ui inverted link list">

                    <a href="#" class="item"><i class="asl interpreting icon"></i></a>

                </div>

            </div>


            <div class="four wide column">
                <h4 class="ui inverted header">ProjetoAPD: Los Tansos</h4>
            </div>

        </div>
    </div>
</div>

</body>

</html>
