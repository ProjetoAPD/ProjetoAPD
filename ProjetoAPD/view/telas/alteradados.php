<?php

session_start();

require_once("../../model/Usuario.php");
require_once("../../model/CrudUsuario.php");
$c = new CrudUsuario();
$user = $c->getUsuario($_SESSION['cod_usuario']);



?>


<!DOCTYPE html>
<html>
<head><link rel="icon" href="assets/images/nome.png">
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Perfil</title>

    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="../semantic/dist/semantic.min.js"></script>


  <style type="text/css">

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
	.ui.vertical.stripe button{
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

	.link{
		color: black;

	}

	.ui.inverted.vertical.masthead.center.aligned.segment{
		background-color: #4C2C63;

	}
	.ui.inverted.vertical.footer.segment{
		background-color: #4C2C63;

	}

	/* CSS do corpo do site _____________________________________________________________________________*/


    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }

    .content {
      color: white;
    }

    .ui.fluid.large.teal.submit.button{
      color:white;
    }

	body {
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
    }



  </style>

  <script src="assets/library/jquery.min.js"></script>
  <script src="../dist/components/visibility.js"></script>
  <script src="../dist/components/sidebar.js"></script>
  <script src="../dist/components/transition.js"></script>
  <script>
  $(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
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
    <a class="item" href="index.php">Home</a>
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
                <a class="item" href="index.php">Home</a>
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


            <!-- corpo do formulario -->
            <div class="ui middle aligned center aligned grid" id="corpo_formulario">
                <div class="column">
                    <div class="ui stacked segment">
                        <div class="column">
                            <div class="field">

                                <div class="ui segment" id="ui_segment_perfil">
                                    <i class="user icon">Email</i>
                                    <h2 id="texto_email"><?= $user->getEmail() ?></h2>
                                </div>


                                <form method="post" action="../../controller/acoesUsu.php?acao=alterar&cod_usuario=<?= $_SESSION['cod_usuario'] ?>">

                                    <div class="ui segment" id="ui_segment_perfil">
                                        <h4><i class="user outline icon"></i>Novo nome de usuario</h4>
                                          <div class="ui input">
                                            <input type="text" name="nome_usuario">
                                          </div>
                                    </div>

                                    <div class="ui segment" id="ui_segment_perfil">
                                        <h4><i class="lock icon"></i>Digite a nova senha</h4>
                                        <div class="ui input">
                                          <input type="password" name="senha">
                                        </div>

                                        <h4><i class="lock icon"></i>Digite a novamente a nova senha</h4>
                                        <div class="ui input">
                                          <input type="password" >
                                        </div>
                                    </div>

                                    <br>
                                    <div class="ui center aligned two column grid" id="botoes">

<!--                                            <a href="" class="ui green icon button">Confirmar-->
<!--                                                <i class="icon sign in alternate"></i></a>-->
                                        <input type="submit" name="Confirmar" value="Confirmar">
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


</body>

</html>








<!-- ______________________________________


<style>
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

-->
