<?php

session_start();

require_once("../../model/Usuario.php");
require_once("../../model/CrudUsuario.php");

$user = new CrudUsuario();
$listaUsuarios = $user->getUsuarios(2);
//pega apenas usuarios do tipo comum

if (!isset($_SESSION['logado'])) {

    header('Location: index.php?acao=naologado');


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


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!------ Include the above in your HEAD tag ---------->



    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"



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
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                        <?php foreach($listaUsuarios as $usuario): ?>

                        <td><?= $usuario->getNome() ?></td>
                        <td><?= $usuario->getEmail() ?></td>


                        <td>
                            <button class="ui green button">
                                <i class="comments icon"></i>
                            </button>

                        </td>

                        <td>
                            Psicólogo
                        </td>

                        <!--<td class="right aligned"><a href="../../controller/acoesUsu.php?acao=delete&cod_usuario= <*****= $usuario->getCodUsuario()?> ">Excluir</a></td>-->
                    </tr>
                    <?php endforeach; ?>
                </table>


            </div>
        </div>


        <div class="container">
            <h3 class=" text-center">Messaging</h3>
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="inbox_people">
                        <div class="headind_srch">
                            <div class="recent_heading">
                                <h4>Recent</h4>
                            </div>
                            <div class="srch_bar">
                                <div class="stylish-input-group">
                                    <input type="text" class="search-bar"  placeholder="Search" >
                                    <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
                            </div>
                        </div>
                        <div class="inbox_chat">
                            <div class="chat_list active_chat">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                        <p>Test, which is a new approach to have all solutions
                                            astrology under one roof.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                        <p>Test, which is a new approach to have all solutions
                                            astrology under one roof.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                        <p>Test, which is a new approach to have all solutions
                                            astrology under one roof.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                        <p>Test, which is a new approach to have all solutions
                                            astrology under one roof.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                        <p>Test, which is a new approach to have all solutions
                                            astrology under one roof.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                        <p>Test, which is a new approach to have all solutions
                                            astrology under one roof.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                        <p>Test, which is a new approach to have all solutions
                                            astrology under one roof.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mesgs">
                        <div class="msg_history">
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>Test which is a new approach to have all
                                            solutions</p>
                                        <span class="time_date"> 11:01 AM    |    June 9</span></div>
                                </div>
                            </div>
                            <div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>Test which is a new approach to have all
                                        solutions</p>
                                    <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                            </div>
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>Test, which is a new approach to have</p>
                                        <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
                                </div>
                            </div>
                            <div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>Apollo University, Delhi, India Test</p>
                                    <span class="time_date"> 11:01 AM    |    Today</span> </div>
                            </div>
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>We work directly with our designers and suppliers,
                                            and sell direct to you, which means quality, exclusive
                                            products, at a price anyone can afford.</p>
                                        <span class="time_date"> 11:01 AM    |    Today</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <input type="text" class="write_msg" placeholder="Type a message" />
                                <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


                <p class="text-center top_spac"> Design by <a target="_blank" href="#">Sunil Rajput</a></p>

            </div></div>



    </div>

</div>

</body>
</html>