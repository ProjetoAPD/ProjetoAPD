<?php

session_start();

require_once("../../model/Postagem_forum.php");
require_once("../../model/CrudUsuario.php");
require_once("../../model/CrudPostagem.php");
require_once("../../model/CrudComentario.php");

if (isset($_SESSION['logado'])) {
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
    <title>Fórum</title>
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
    <link rel="stylesheet" type="text/css" href="assets/style.css">


    <style type="text/css">

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
    <a class="active item" href="forum.php">Fórum</a>
    <a class="item" href="chat.php">Chat</a>
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
                <a class="active item" href="forum.php">Fórum</a>
                <a class="item" href="chat.php">Chat</a>

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
            <div class="ui comments">

            </div>
        </div>


        <!-- Postar -->
        <?php
        if (isset($_SESSION['logado'])) {
            ?>

            <div id="poster">
                <form method="post" action="../../controller/acoesFor.php?acao=postar">
                    <div class="ui fluid action input">
                        <label>Título</label>
                        <input type="text" name="titulo" id="titulo">
                    </div>
                        <br>
                        <label>Texto</label>
                    <input type="text" name="texto" id="texto">
                    <br>
                    <input type="submit" name="Enviar">
                </form>
            </div>

            <?php
        }
        ?>

        <!-- forum -->
        <hr>
        <div id="bgforum">

            <?php
            $crud = new CrudPostagem();
            $postagens = $crud->getPostagens();

            foreach ($postagens as $postagem): ?>

                <ul id="forum">
                    <li id="perf"><h2><?= $postagem['titulo_postagem'] ?></h2></li>

                    <?php $usu = $crud->getUsuarioPostagem($postagem['cod_postagem']); ?>
                    <li><h3><?= $usu['nome'] ?></h3></li>

                    <hr style="width: 90%;">
                    <li id="preenche"><p> <?= $postagem['texto_postagem'] ?> </p></li>

                    <?php if (isset($_SESSION['logado'])){
                            if ($postagem['usuario_cod_usuario'] == $_SESSION['cod_usuario'] OR $user->getCodTipoUsuario() == 1){ ?>

                        <li><a href="../../controller/acoesFor.php?acao=excluir&cod_postagem=<?= $postagem['cod_postagem'] ?>">Excluir</a></li>

                    <?php }} ?>

                </ul>



                <?php

                $crudcoment = new CrudComentario();
                $comentarios = $crudcoment->getComentarios($postagem['cod_postagem']);

                foreach ($comentarios as $comentario){
                    $usucomentario = $crudcoment->getUsuarioComentario($comentario['cod_comentario'])
                ?>

                <div id="comment">
                                <li id="idcom"><?= $usucomentario['nome'] ?></li>
                                <li id="contcom" ><?= $comentario['texto_comentario'] ?></li>

                                <?php if (isset($_SESSION['logado'])){
                                        if ($comentario['usuario_cod_usuario'] == $_SESSION['cod_usuario'] OR $user->getCodTipoUsuario() == 1){ ?>

                                            <li><a href="../../controller/acoesFor.php?acao=excluirComent&cod_comentario=<?= $comentario['cod_comentario'] ?>">Excluir</a></li>

                                        <?php }} ?>

                </div>
                <?php } ?>


                <hr>
                <?php if (isset($_SESSION['logado'])) {  ?>
                                <form method="post" action="../../controller/acoesFor.php?acao=comentar">
                                    <input type="text" name="comentario" placeholder="Comente aqui...">
                                    <input type="hidden" name="cod_postagem" value="<?= $postagem['cod_postagem'] ?>">
                                    <input type="submit" name="Enviar">
                                </form>
                <?php } ?>

            <?php endforeach; ?>




            <div class="ui vertically divided grid">

            </div>
        </div>
        <div class="two column row">
          <footer class="ui horizontal header divider">
                <a href="forum.php">Voltar ao topo</a>
            </footer>
        </div>
    </div>


</div>
</body>
</html>
