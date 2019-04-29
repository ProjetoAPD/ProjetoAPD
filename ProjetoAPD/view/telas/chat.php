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

    header('Location: index.php?erro=1');
 

}else{
    $c = new CrudUsuario();
    $user = $c->getUsuario($_SESSION['cod_usuario']);
}


?>


<!DOCTYPE html>
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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="../semantic/dist/semantic.min.js"></script>
    <script src="assets/js.js"></script>


    <!------ Include the above in your HEAD tag ---------->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

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


            window.setInterval(carrega, 1000);
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
        <?php if (isset($_GET['mensagem']) and $_GET['mensagem'] = "denunciado"){?>
            alert('O usuário foi denunciado');
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
                            <form class="ui form" method="post" action="../../controller/acoesChat.php?acao=enviar" autocomplete="off">

                                
                                    <div class="ui fluid action input">
                                        <input type="hidden" name="usuario2" value="<?= $_GET['usuario2'] ?> ">
                                              <input type="text" name="mensagem" <?php if (isset($_GET['usuario2'])) { echo "autofocus"; } ?> >
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
