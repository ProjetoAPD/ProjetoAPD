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
    <title>ProjetoAPD</title>

    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">

    <script src="../telas/assets/jquery-3.3.1.min.js"></script>
    <script src="../semantic/dist/semantic.min.js"></script>




    <style type="text/css">

    #fundoindex{
          background-image: radial-gradient(transparent, #4c2b63),linear-gradient(to bottom,transparent, #4c2b63),url("assets/images/branquin.png");
          padding: 25px;
          background-repeat: no-repeat;
          background-size: auto;
        }

        .hidden{
            display: none;
        }

        .hidden.menu {
            display: none;
        }

        .masthead.segment {
            min-height: 70px;
            padding: 1em 0em;
        }
        .ui.comments{
            padding:  0px 2%;
        }
        .comment{
            padding:  0px 2%;
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
    <script src="../semantic/dist/semantic.js"></script>
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
                // foreach dos posts
                <?php
                $crud = new CrudPostagem();
                $postagens = $crud->getPostagens();

                foreach ($postagens as $postagem): ?>

                $("#denPostButton<?php echo $postagem['cod_postagem']?> ").click(function(){
                    $("#denPostModal<?php echo $postagem['cod_postagem']?>")
                        .modal('show')
                    ;
                });




                <?php
                $crudcoment = new CrudComentario();
                $comentarios = $crudcoment->getComentarios($postagem['cod_postagem']);

                foreach ($comentarios as $comentario):

                ?>

                $("#denComButton<?php echo $comentario['cod_comentario']?> ").click(function(){
                    $("#denComModal<?php echo $comentario['cod_comentario']?>")
                        .modal('show')
                    ;
                });

                <?php endforeach; ?>

                <?php endforeach; ?>

            });

    </script>
    <script>
        <?php if (isset($_GET['mensagem']) and $_GET['mensagem'] == 'postagemDenunciada') { ?>
            alert('Postagem denunciada');
        <?php }elseif (isset($_GET['mensagem']) and $_GET['mensagem'] == 'comentarioDenunciado') { ?>
            alert('Comentario denunciado');
        <?php } ?>
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
    <div class="ui inverted vertical masthead center aligned segment" id="fundoindex">

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

                <?php } else {  ?>



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


        <!-- Postar -->
        <?php
        if (isset($_SESSION['logado'])) {
            ?>

            <div id="poster">
                <br>
                <div class="ui horizontal divider" id="branco">
                    <h2 class="center aligned">Bem vindo ao nosso forum, colabore com a comunidade fazendo sua postagem!</h2>
                </div>

                <form method="post" action="../../controller/acoesFor.php?acao=postar" autocomplete="off">

                    <label>Título</label>
                    <br>
                    <input type="text" name="titulo" id="titulo">
                    <br>
                    <label>Texto</label>
                    <br>
                    <textarea name="texto" id="texto"></textarea>
                    <br>
                    <button type="submit" name="Enviar" class="ui blue labeled submit icon button"><i class="icon edit"></i>Enviar</button>
                </form>
            </div>

            <?php
        }else {?>
            <br>
            <div class="ui horizontal divider" id="branco">
                <h2>Bem vindo ao nosso forum, faça login ou cadastre-se para participar!</h2>

            </div>


        <?php  } ?>

    </div>

    <!-- forum -->

    <div class="ui comments center aligned" id="outset">
        <h3 class="ui dividing header center aligned white " id="branco">Postagens</h3>

        <!--postagem-->

        <?php
        $crud = new CrudPostagem();
        $postagens = $crud->getPostagens();

        foreach ($postagens as $postagem): ?>

            <div class="comment" id="post">
                <a class="avatar">

                    <img src="assets/images/avatar/tom.jpg">

                </a>
                <div class="content">
                    <?php $usu = $crud->getUsuarioPostagem($postagem['cod_postagem']); ?>
                    <a class="ui header author"><?= $usu['nome'] ?></a>
                    <div class="metadata">
                        <div class="date"><?= $postagem['data_postagem'] ?></div>


                    </div>
                        <?php if (isset($_SESSION['logado'])) { ?>
                            <button class="mini ui  negative basic button" id="denPostButton<?=$postagem['cod_postagem']?>">
                                <i class="remove icon"></i>
                                Denunciar
                            </button>
                        <?php } ?>


                    <!--/////////////////////////////////////////////////////////////////////-->


                    <?php if (isset($_SESSION['logado'])) {  ?>


                        <div class="ui fullscreen modal transition" id="denPostModal<?php echo $postagem['cod_postagem']?>">
                            <div class="header">
                                Denunciar uma postagem
                            </div>
                            <div class="content">
                                <form action="../../controller/acoesFor.php?acao=denunciaPost" method="POST" autocomplete="off">
                                <div class="ui form">
                                    <h4 class="ui dividing header">Dê um motivo da sua denuncia contra essa postagem</h4>
                                    <input type="hidden" name="cod_postagem" value="<?= $postagem['cod_postagem'] ?>">
                                    <input type="hidden" name="cod_usuario" value="<?= $postagem['usuario_cod_usuario'] ?>">
                                    <div class="field">
                                        <label>Motivo</label>
                                        <textarea name="texto"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="actions">
                                <button type="submit" class="ui green ok inverted button"name="Enviar denuncia"><i class="checkmark icon"></i>enviar</button>
                            </div>
                            </form>
                        </div>

                    <?php }else{}?>


                    <!--        ///////////////////////////////////////////////////-->
                    <!---->




                    <div class="ui fitted divider"></div>

                    <div class="text">
                        <div class="ui horizontal header left aligned">
                            <h4 class="ui header"><?= $postagem['titulo_postagem'] ?></h4>
                        </div>

                        <p><?= $postagem['texto_postagem'] ?></p>


                        <?php if (isset($_SESSION['logado'])){
                            if ($postagem['usuario_cod_usuario'] == $_SESSION['cod_usuario'] OR $user->getCodTipoUsuario() == 1){ ?>
                                <a type="button" class="right floated ui red labeled icon button" href="../../controller/acoesFor.php?acao=excluir&cod_postagem=<?= $postagem['cod_postagem'] ?>" >
                                    <i class="large trash icon"></i><p>Excluir</p></a>

                            <?php }} ?>

                    </div>

                </div>

                <?php if (isset($_SESSION['logado'])) {  ?>



                    <form method="post" action="../../controller/acoesFor.php?acao=comentar" autocomplete="off">
                        <div class="ui fluid action input" id="comake">
                            <input type="text" name="comentario"  placeholder="Comente aqui...">
                            <button type="submit" class="ui button"><i class="pencil alternate icon"></i><p>Enviar</p></button>
                        </div>

                        <input type="hidden" name="cod_postagem" value="<?= $postagem['cod_postagem'] ?>">

                    </form>
                    <br>
                <?php } ?>


                <?php

                $crudcoment = new CrudComentario();
                $comentarios = $crudcoment->getComentarios($postagem['cod_postagem']);

                foreach ($comentarios as $comentario){
                    $usucomentario = $crudcoment->getUsuarioComentario($comentario['cod_comentario'])
                    ?>

                    <div class="ui container segment comments" id="comment">
                        <div class="comment">
                            <a class="avatar">
                                <img src="assets/images/avatar/nan.jpg">
                            </a>
                            <div class="content">
                                <a class="author"><?= $usucomentario['nome'] ?></a>
                                <div class="metadata">
                                    <div class="date"><?= $comentario['dt_comentario'] ?></div>
                                </div>
                                <?php if (isset($_SESSION['logado'])) { ?>
                                    <button class="mini ui  negative basic button" id="denComButton<?php echo $comentario['cod_comentario']?>">
                                        <i class="remove icon"></i>
                                        denunciar
                                    </button>
                                <?php } ?>
                                <!--/////////////////////////////////////////////////////////////////////-->

                                <?php if (isset($_SESSION['logado'])) {  ?>

                                    <div class="ui fullscreen modal transition" id="denComModal<?php echo $comentario['cod_comentario']?>">
                                        <div class="header">
                                            Denunciar um comentario
                                        </div>
                                        <div class="content">
                                            <form action="../../controller/acoesFor.php?acao=denunciaComent" method="POST" autocomplete="off">
                                                <div class="ui form">
                                                    <h4 class="ui dividing header">Dê um motivo da sua denuncia contra esse comentario</h4>
                                                    <input type="hidden" name="cod_postagem" value="<?= $comentario['cod_comentario'] ?>">
                                                    <input type="hidden" name="cod_usuario" value="<?= $postagem['usuario_cod_usuario'] ?>">
                                                    <div class="field">
                                                        <label>Motivo</label>
                                                        <textarea name="texto"></textarea>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="actions">
                                            <button type="submit" class="ui green ok inverted button"name="Enviar denuncia"> <i class="checkmark icon"></i>enviar</button>
                                        </div>

                                    </div>
                                    </form>

                                <?php }else{}?>
                                <!--        ///////////////////////////////////////////////////-->


                                <div class="ui fitted divider"></div>
                                <div class="text">
                                    <?= $comentario['texto_comentario'] ?>
                                </div>

                                <?php if (isset($_SESSION['logado'])){
                                    if ($comentario['usuario_cod_usuario'] == $_SESSION['cod_usuario'] OR $user->getCodTipoUsuario() == 1){ ?>




                                        <a type="button" class="mini ui  red labeled icon button" href="../../controller/acoesFor.php?acao=excluirComent&cod_comentario=<?= $comentario['cod_comentario'] ?>"" >
                                        <i class=" trash icon"></i><p>Excluir</p>

                                    <?php }} ?>
                                </a>

                            </div>
                        </div>
                        <br>
                    </div>
                <?php } ?>
            </div>
        <?php endforeach; ?>

        <br>
        <footer class="ui horizontal header divider">
            <a href="forum.php">Voltar ao topo</a>
        </footer>
        <br>
    </div>
</div>




</div>

<!--fim da postagem-->






</div>
</body>
</html>
