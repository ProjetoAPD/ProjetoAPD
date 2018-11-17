<?php

session_start();

require_once("../../model/Usuario.php");
require_once("../../model/CrudUsuario.php");
require_once("../../model/CrudMensagem.php");
require_once("../../model/CrudDenuncias.php");

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
    <title>ProjetoAPD</title>

    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="../semantic/dist/semantic.min.js"></script>


    <!------ Include the above in your HEAD tag ---------->



    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">



    <style type="text/css">

        /*/////////////////////////////////////////*/


        #mensagens{
            width: 100%;
            background-color: white;
            height: 560px;
            overflow: auto;        
        }


        #enviada{
            text-align: left;
            color: white;
            background: #301742;
            border:1px black solid;
            border-radius: 2px;
            margin-left: 2px;
            margin-right: 20px;
            min-width: 10%;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            word-wrap: break-word;
            margin-bottom: 10px;
            margin-top: 10px;
        }



        #recebida{
            text-align: right;
            color: white;
            border:1px white solid;
            background: #4c2c63;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            margin-left: 20px;
            margin-right: 2px;
            word-wrap: break-word;
            margin-bottom: 10px;
            margin-top:1px;
        }



        #chat{
            background-color: #301742;
            padding-top:1px;
            padding-bottom:1px;
   
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
                padding:0 6px;
            }
        }

        .ui.unstackable.table{
            padding: 0px;
            height: 500px;
            width:401px;
        }
        #psicologos{
            text-align: intial;
        }
        #coluna{
           width:61%;
           margin: 0px;
           padding: 0px;
        }
        #formulario_mensagem{
            padding: 0 1%;
            height: 100%;            
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

        $(function() {
            $("#voltar").hide();
            $("#psicologos").hide();

            $('#novas_msg').click(function () {
                $("#novas_msg").hide();
                $("#voltar").fadeIn();
                $("#psicologos").fadeIn();
                $("#usuarios").hide();


            });

            $('#voltar').click(function () {
                $("#voltar").hide();
                $("#novas_msg").fadeIn();
                $("#usuarios").fadeIn();
                $("#psicologos").hide();


            });


        });
            function getUrlVars()
            {
                var vars = [], hash;
                var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                for(var i = 0; i < hashes.length; i++)
                {
                    hash = hashes[i].split('=');
                    vars.push(hash[0]);
                    vars[hash[0]] = hash[1];
                }
                return vars;
            }


            window.setInterval(carrega, 10);
            var usuario2 = '';
            function carrega(usuario2) {
                usuario2 = getUrlVars()["usuario2"];
                $.get('mensagens.php',
                    {
                        usuario2 : usuario2
                    }, function(data){
                        $('#mensagens').html(data);
                        $('#usuario2').val(usuario2);
                    });
            }



    </script>
    <script>
        <?php if (isset($_GET['mensagem']) and $_GET['mensagem'] = "denPostagemDelete"){?>
            alert('A denúncia foi apagada');
        <?php } ?>
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
                    <h4 id="textin">Olá <?= $user->getNome() ?></h4>

                    <?php if ($user->getCodTipoUsuario() == 1) { ?>
                    <a class="ui inverted button" href="listausuarios.php">Lista de usuários</a>
                    <?php } ?>

                    <a class="ui inverted button" href="perfil.php">Minha conta</a>
                    <a class="ui inverted button" href="../../controller/acoesUsu.php?acao=sair">Sair</a>
                </div>

                <?php } ?>

            </div>
            <br>
           
    
            <div class="container" >


                <!--------------------------------- USUARIOS -------------------------------->
                <div class="ui two column middle aligned very relaxed stackable grid" id="allchat">

                    <div id="usulist">

                     

                        <div class="ui comments">

                            <table class="ui unstackable table">
                                <thead>
                                    <th>
                                        <div>
                                            <h3>
                                                MENSAGENS
                                            </h3>
                                        </div>

                                        <div style="float: right">
                                            <div>
                                                <button class="ui basic red button" id="novas_msg">NOVAS MENSAGENS</button>
                                            </div>
                                            <div>
                                                <button class="ui basic red button" id="voltar">VOLTAR</button>
                                            </div>
                                        </div>
                                    </th>
                                </thead>

                                <td>
                                    <div id="usuarios" class="ui selectable unstackable table">
                                    <?php foreach($listaUsuarios as $usuario):

                                        $cod_usuario1 = $_SESSION['cod_usuario'];
                                        $cod_usuario2 = $usuario->getCodUsuario();

                                        $c1 = new CrudMensagem();
                                        $obj = $c1->verificaConversa($cod_usuario1, $cod_usuario2);

                                        if ($obj == true){

                                        ?>
                                   <div class="ui middle aligned selection list">

                                        <div class="column">
                                            <div class="ui selectable horizontal segments">

                                                    <div class="column">
                                                        <a href="?usuario2=<?= $usuario->getCodUsuario() ?>" id="usuario2"><button class="ui basic red button">
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
                                    </div>



                                    <!-- ------PSICOLOGOS------ -->
                     
                                    <div class="column" id="psicologos">
                                        <div class="ui comments">

                                            
                                            <table class="ui unstackable table">
                                                <thead>
                                                <tr>

                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>Iniciar Conversa</th>
                                                    <th class="center aligned"><i class="address card icon"></i></th>
                                                </tr>
                                                </thead>

                                                <tr>
                                                    <?php foreach($listaPsicologos as $usuario):
                                                    $cod_usuario1 = $_SESSION['cod_usuario'];
                                                    $cod_usuario2 = $usuario->getCodUsuario();

                                                    $c1 = new CrudMensagem();
                                                    $obj = $c1->verificaConversa($cod_usuario1, $cod_usuario2);

                                                    if ($cod_usuario1 == $cod_usuario2){
                                                        $obj = true;
                                                    }
                                                    if ($obj == false){ ?>
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
                                                <?php } endforeach; ?>
                                            </table>


                                        </div>
                                    </div>
                        </div>
                                </td>
                            </table>
                        </div></div>

                    <div class=" column" id="coluna">
                        <!-- CHAAAAT -->

                        <div class="ui container" id="chat">
                            <div class="ui comments" id="mensagens" style="border-radius: 4px;">

                                <?php include_once('mensagens.php'); ?>


                            </div>
                            <form class="ui form" method="post" action="../../controller/acoesChat.php?acao=enviar">

                                
                                    <div class="ui fluid action input">
                                        <input type="hidden" name="usuario2" value="<?= $_GET['usuario2'] ?> ">
                                              <input type="text" name="mensagem">
                                              <button class="ui simple green icon button"" type="submit" name="Enviar" <?php if(!isset($_GET['usuario2'])){echo "disabled";} ?> >
                                                enviar
                                                <i class="send icon"></i>

                                              </button>
                                          </div>


                            </form>

                          
                        </div>

                    </div>



                    <!-- CHAAAAT -->

            </div>



        </div>

    </div>

</div>

</body>
</html>