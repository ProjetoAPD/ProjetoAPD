<?php include "base/cabecalho_generico.php";

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

            <br>
            <div class="container" >


                <!--------------------------------- USUARIOS -------------------------------->
                <div class="ui two column middle aligned very relaxed stackable grid" id="allchat">

                    <div id="usulist">

                     

                        <div class="ui comments">

                            <table class="ui unstackable table" id="lista_usu_chat">
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
                            <div class="ui comments" id="mensagens" style="border-radius: 0.4em;">

                                <?php include_once('mensagens.php'); ?>


                            </div>
                            <form class="ui form" method="post" action="../../controller/acoesChat.php?acao=enviar" autocomplete="off">

                                    <div class="ui fluid action input">
                                        <input type="hidden" name="usuario2" value="<?= $_GET['usuario2'] ?> ">
                                        <input type="text" name="mensagem" <?php if (isset($_GET['usuario2'])) { echo "autofocus"; } ?> >
                                        <button class="ui simple green icon button" type="submit" name="Enviar" <?php if(!isset($_GET['usuario2'])){echo "disabled";} ?>>Enviar<i class="send icon"></i></button>
                                    </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
