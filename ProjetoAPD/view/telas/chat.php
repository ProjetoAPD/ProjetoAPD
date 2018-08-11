<?php

session_start();

require_once("../../model/Usuario.php");
require_once("../../model/CrudUsuario.php");
require_once("../../model/CrudMensagem.php");

$user = new CrudUsuario();
//pega apenas usuarios do tipo psicologos
$listaPsicologos = $user->getPsicologos();

//pega apenas usuarios do tipo comum
$listaUsuarios = $user->getUsuarios();

if (!isset($_SESSION['logado'])) {

    header('Location: index.php?erro=naologado');


}else{
    $c = new CrudUsuario();
    $user = $c->getUsuario($_SESSION['cod_usuario']);
}


?>


<!DOCTYPE html>
<!-- saved from url=(0087)file:///home/aluno/%C3%81rea%20de%20Trabalho/aa/ProjetoAPD%20v14.11(1)/telas/forum.php -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="assets/images/nome.png">
    <!-- Standard Meta -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Chat</title>
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/site.css">

    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/menu.css">

    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/icon.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/transition.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/components/table.css">
    <link rel="stylesheet" type="text/css" href="assets/style.css">


    <!------ Include the above in your HEAD tag ---------->



    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">



    <style type="text/css">

        /*/////////////////////////////////////////*/

        #mensagens{
            width: 50%;
            background-color: red;
        }
        #enviada{
            text-align: left;
        }
        #recebida{
            text-align: right;
        }
        /*////////////////////////////////////////////*/


        .hidden.menu {
            display: none;
        }

        .masthead.segment {
            min-height: 700px;
            padding: 1em 0em;
        }

        .masthead .logo.item img {
            margin-right: 1em;
        }

        .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
        }

        .masthead h1.ui.header {
            margin-top: 3em;
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

            .column {
                background: white;
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

<body class="pushable">


<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu left">
    <a class="item" href="index.php">Home</a>
    <a class="item" href="forum.php">Fórum</a>
    <a class="active item" href="chat.php">Chat</a>
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
                <a class="item" href="index.php">Home</a>
                <a class="item" href="forum.php">Fórum</a>
                <a class="active item" href="chat.php">Chat</a>

                <?php if (!isset($_SESSION['logado'])){ ?>

                <div class="right item">
                    <a class="ui inverted button" href="login.php">Login</a>
                    <a class="ui inverted button" href="cadastro.php">Cadastre-se</a>
                </div>

                <?php } else { ?>

                <div class="right item">
                    <p>Olá <?= $user->getNome() ?> </p>

                    <?php if ($user->getCodTipoUsuario() == 1) { ?>
                    <a class="ui inverted button" href="listausuarios.php">Lista de usuários</a>
                    <?php } ?>

                    <a class="ui inverted button" href="perfil.php">Minha conta</a>
                    <a class="ui inverted button" href="../../controller/acoesUsu.php?acao=sair">Sair</a>
                </div>

                <?php } ?>

            </div>

            <div class="container">



                <div class="ui two column middle aligned very relaxed stackable grid">

                    <div class="column">

                        <br>

                        <div class="ui comments">

                            <table class="ui selectable unstackable table">
                                <thead>
                                    <th>
                                        <div>
                                            <h3>
                                                MENSAGENS
                                            </h3>
                                        </div>

                                        <div>
                                            <button class="ui basic red button">NOVAS MENSAGENS</button>
                                        </div>
                                    </th>
                                </thead>

                                <td>
                                    <?php foreach($listaUsuarios as $usuario):

                                        $cod_usuario1 = $_SESSION['cod_usuario'];
                                        $cod_usuario2 = $usuario->getCodUsuario();

                                        $c1 = new CrudMensagem();
                                        $obj = $c1->verificaConversa($cod_usuario1, $cod_usuario2);

                                        if ($obj == true){

                                        ?>
                                    <div class="ui vertical segments">

                                        <div class="column">
                                            <div class="ui horizontal segments">

                                                    <div class="column">
                                                        <a href="?usuario2=<?= $usuario->getCodUsuario() ?>"><button class="ui basic red button">
                                                            <i class="icon red user"></i>
                                                        </button></a>
                                                    </div>

                                                    <div class="column">
                                                        <h2>
                                                           <?= $usuario->getNome(); ?>
                                                        </h2>
                                                    </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php } endforeach; ?>
                                </td>




                            </table>
                        </div>
                    </div>


                    <div class="column">
                        <div class="ui comments">

                            <br>
                            <table class="ui selectable unstackable table">
                                <thead>
                                <tr>

                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Iniciar Conversa</th>
                                    <th class="center aligned"><i class="address card icon"></i></th>
                                </tr>
                                </thead>

                                <tr>
                                    <?php foreach($listaPsicologos as $usuario): ?>

                                    <td><?= $usuario->getNome() ?></td>
                                    <td><?= $usuario->getEmail() ?></td>


                                    <td>
                                        <a href="?usuario2=<?= $usuario->getCodUsuario() ?>"><button class="ui green button">
                                            <i class="comments icon"></i>
                                        </button></a>

                                    </td>

                                    <td>
                                        Psicólogo
                                    </td>

                                </tr>
                                <?php endforeach; ?>
                            </table>


                        </div>
                    </div>
                </div>

            </div>


        </div>
        <div>
            <div>

                <div id="mensagens">
                    <?php

                    if (isset($_GET['usuario2'])){
                            $usuario1 = $_SESSION['cod_usuario'];
                            $usuario2 = $_GET['usuario2'];

                            $c1 = new CrudMensagem();
                            $mensagens = $c1->getMensagens($usuario1, $usuario2);


                            foreach ($mensagens as $mensagem):
                                if ($mensagem['cod_usuario1'] == $usuario1){ ?>

                                    <p id="enviada"><?= $mensagem['texto'] ?></p>
                                <?php }else{ ?>
                                    <p id="recebida"><?= $mensagem['texto'] ?></p>

                                <?php } ?>

                            <?php endforeach; }?>
                </div>


        </div>
            <div>
                <form method="post" action="../../controller/acoesChat.php?acao=enviar">
                    <input type="text" name="mensagem">
                    <input type="hidden" name="usuario2" value=" <?= $_GET['usuario2'] ?> ">
                    <input type="submit" name="Enviar">
                </form>
            </div>
        </div>

    </div>

</div>


</body>
</html>