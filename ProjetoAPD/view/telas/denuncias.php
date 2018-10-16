<?php

session_start();

require_once("../../model/CrudUsuario.php");
require_once("../../model/CrudDenuncias.php");

if (isset($_SESSION['logado'])) {
    $a = new CrudUsuario();
    $usu = $a->getUsuario($_SESSION['cod_usuario']);

    if ($usu->getCodTipoUsuario() == 1){ ?>

        <!doctype html>
        <html lang="en">
        <head>
            <link rel="icon" href="assets/images/nome.png">
            <!-- Standard Meta -->
            <meta charset="utf-8"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

            <!-- Site Properties -->
            <title>Denúncias</title>

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
                    padding-top: 1em;
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

                    padding-top: 0px;
                    padding-bottom: 0px;
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
                    padding-top:0.25%;
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
                                <h4 id="textin">Olá <?= $usu->getNome() ?></h4>

                                <?php if ($usu->getCodTipoUsuario() == 1) { ?>
                                    <a class="ui inverted button" href="listausuarios.php">Lista de usuários</a>
                                <?php } ?>

                                <a class="ui inverted button" href="perfil.php">Minha conta</a>
                                <a class="ui inverted button" href="../../controller/acoesUsu.php?acao=sair">Sair</a>
                            </div>

                        <?php } ?>

                    </div>
                </div>


                <div class="ui center aligned container">



                        <!--FORUM----------------------------------------------------------------------------------------------------------------->
                <div id="den_forum">
                    <br>
                    <br>
                    <h2>Denúncias fórum</h2>
                    <div class="ui comments">

                        <br>
                        <table class="ui selectable unstackable table">
                            <thead>
                            <tr>
                                <th>Codigo postagem</th>
                                <th>Nome do usuário</th>
                                <th>Postagem denunciada</th>
                                <th>Texto denúncia</th>
                                <th>Data denúncia</th>
                                <th class="right aligned">#</th>
                            </tr>
                            </thead>

                            <tr>
                                <?php

                                $b = new CrudDenuncias();
                                $denuncias = $b->getDenunciasForum();

                                foreach($denuncias as $denuncia): ?>
                                <td><?= $denuncia['cod_postagem'] ?></td>
                                <td><?= $b->getUsuarioDenunciaForum($denuncia['cod_den_forum']) ?></td>
                                <td><?= $b->getPostagemDenForum($denuncia['cod_postagem']) ?></td>
                                <td><?= $denuncia['tex_den_f'] ?></td>
                                <td><?= $denuncia['data_hora'] ?></td>

                                <td class="right aligned"><a href="../../controller/acoesUsu.php?acao=deleteDenuncia&cod_usuario=<?= $denuncia['cod_usuario'] ?>">Excluir</a></td>
                            </tr>
                            <?php endforeach; ?>


                        </table>

                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------------------------------>



                <!--CHAT----------------------------------------------------------------------------------------------------------------->
                <div id="den_chat">
                    <br>
                    <br>
                    <h2>Denúncias chat</h2>
                    <div class="ui comments">

                        <br>
                        <table class="ui selectable unstackable table">
                            <thead>
                            <tr>
                                <th>Codigo mensagem</th>
                                <th>Nome do usuário</th>
                                <th>Mensagem denunciada</th>
<!--                                <th>Texto denúncia</th>-->
                                <th>Data Denúncia</th>
                                <th class="right aligned">#</th>
                            </tr>
                            </thead>

                            <tr>
                                <?php

                                $b = new CrudDenuncias();
                                $denuncias = $b->getDenunciasChat();

                                foreach($denuncias as $denuncia): ?>
                                <td><?= $denuncia['conversa_cod_mensagem'] ?></td>
                                <td><?= $b->getUsuarioDenunciaChat($denuncia['cod_den_chat']) ?></td>
                                <td><?= $b->getMensagemDenChat($denuncia['conversa_cod_mensagem']) ?></td>
<!--                                <td>--><?php//= $denuncia['mensagem_den_chat'] ?><!--</td>-->
                                <td><?= $denuncia['dt_den_chat'] ?></td>

                                <td class="right aligned"><a href="../../controller/acoesUsu.php?acao=deleteDenuncia&cod_usuario=<?= $denuncia['cod_usuario'] ?>">Excluir</a></td>
                            </tr>
                            <?php endforeach; ?>


                        </table>

                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------------------------------>




                <!--COMENTARIO----------------------------------------------------------------------------------------------------------------->
                <div id="den_coment">
                    <br>
                    <br>
                    <h2>Denúncias chat</h2>
                    <div class="ui comments">

                        <br>
                        <table class="ui selectable unstackable table">
                            <thead>
                            <tr>
                                <th>Codigo Comentario</th>
                                <th>Nome do usuário</th>
                                <th>Postagem</th>
                                <th>Comentario denunciado</th>
                                <th>Texto denúncia</th>
                                <th>Data Denúncia</th>
                                <th class="right aligned">#</th>
                            </tr>
                            </thead>

                            <tr>
                                <?php

                                $b = new CrudDenuncias();
                                $denuncias = $b->getDenunciasComentario();

                                foreach($denuncias as $denuncia): ?>
                                <td><?= $denuncia['cod_den_coment'] ?></td>
                                <td><?= $b->getUsuarioDenunciaComentario($denuncia['cod_den_coment']) ?></td>
                                <td><?= $b->getPostagemDenForumFromComent($denuncia['cod_comentario']) ?></td>
                                <td><?= $b->getComentarioDenComent($denuncia['cod_comentario']) ?></td>
                                <td><?= $denuncia['tex_den_c'] ?></td>
                                <td><?= $denuncia['data_hora'] ?></td>

                                <td class="right aligned"><a href="../../controller/acoesUsu.php?acao=deleteDenuncia&cod_usuario=<?= $denuncia['cod_usuario'] ?>">Excluir</a></td>
                            </tr>
                            <?php endforeach; ?>


                        </table>

                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------------------------------>





                </div>
            </div>
        </div>
        </body>
        </html>






































    <?php
    }
}