<?php include "base/cabecalho_forum.php";

        require_once("../../model/CrudPostagem.php");
        require_once("../../model/CrudComentario.php");

        if (isset($_SESSION['logado'])) {
            ?>

        <!-- Postar -->
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


                        <div class="ui fullscreen modal transition" id="denPostModal<?=$postagem['cod_postagem']?>">
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
                                <button type="submit" class="ui green ok inverted button"name="Enviar denuncia"><i class="checkmark icon"></i>Enviar</button>
                            </div>
                            </form>
                        </div>

                    <?php } ?>


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
                                    <button class="mini ui  negative basic button" id="denComButton<?=$comentario['cod_comentario']?>">
                                        <i class="remove icon"></i>
                                        Denunciar
                                    </button>
                                <?php } ?>
                                <!--/////////////////////////////////////////////////////////////////////-->

                                <?php if (isset($_SESSION['logado'])) {  ?>

                                    <div class="ui fullscreen modal transition" id="denComModal<?=$comentario['cod_comentario']?>">
                                        <div class="header">
                                            Denunciar um comentario
                                        </div>
                                        <div class="content">
                                            <form action="../../controller/acoesFor.php?acao=denunciaComent" method="POST" autocomplete="off">
                                                <div class="ui form">
                                                    <h4 class="ui dividing header">Dê um motivo da sua denuncia contra esse comentario</h4>
                                                    <input type="hidden" name="cod_comentario" value="<?= $comentario['cod_comentario'] ?>">
                                                    <input type="hidden" name="cod_usuario" value="<?= $comentario['usuario_cod_usuario'] ?>">
                                                    <div class="field">
                                                        <label>Motivo</label>
                                                        <textarea name="texto"></textarea>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="actions">
                                            <button type="submit" class="ui green ok inverted button"name="Enviar denuncia"> <i class="checkmark icon"></i>Enviar</button>
                                        </div>

                                    </div>
                                    </form>

                                <?php } ?>
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
