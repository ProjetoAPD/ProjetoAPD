<?php include "base/cabecalho_generico.php";

    require_once("../../model/CrudUsuario.php");
    require_once("../../model/CrudDenuncias.php");

    if (isset($_SESSION['logado']) AND $user->getCodTipoUsuario() == 1){ ?>
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
                                <td><?= $b->getUsuarioDenunciaForum($denuncia['cod_den_forum']) ?></td>
                                <td><?= $b->getPostagemDenForum($denuncia['cod_postagem']) ?></td>
                                <td><?= $denuncia['tex_den_f'] ?></td>
                                <td><?= $denuncia['data_hora'] ?></td>

                                <td class="right aligned"><a href="../../controller/acoesUsu.php?acao=deleteUsuDenuncia&cod_usuario=<?= $denuncia['cod_usuario'] ?>">Banir usuário</a> |
                                    <a href="../../controller/acoesDen.php?acao=deleteDenunciaPostagem&cod_denuncia=<?= $denuncia['cod_den_forum'] ?>">Excluir</a></td>
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
                                <td><?= $b->getUsuarioDenunciaChat($denuncia['cod_den_chat']) ?></td>
                                <td><?= $b->getMensagemDenChat($denuncia['conversa_cod_mensagem']) ?></td>
                                <td><?= $denuncia['dt_den_chat'] ?></td>

                                <td class="right aligned"><a href="../../controller/acoesUsu.php?acao=deleteUsuDenuncia&cod_usuario=<?= $denuncia['cod_usuario'] ?>">Banir usuário</a> |
                                    <a href="../../controller/acoesDen.php?acao=deleteDenunciaChat&cod_denuncia=<?= $denuncia['cod_den_chat'] ?>">Excluir</a></td>

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
                    <h2>Denúncias comentários</h2>
                    <div class="ui comments">

                        <br>
                        <table class="ui selectable unstackable table">
                            <thead>
                            <tr>
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
                                <td><?= $b->getUsuarioDenunciaComentario($denuncia['cod_den_coment']) ?></td>
                                <td><?= $b->getPostagemDenForumFromComent($denuncia['cod_comentario']) ?></td>
                                <td><?= $b->getComentarioDenComent($denuncia['cod_comentario']) ?></td>
                                <td><?= $denuncia['tex_den_c'] ?></td>
                                <td><?= $denuncia['data_hora'] ?></td>

                                <td class="right aligned"><a href="../../controller/acoesUsu.php?acao=deleteUsuDenuncia&cod_usuario=<?= $denuncia['cod_usuario'] ?>">Banir usuário</a> |
                                    <a href="../../controller/acoesDen.php?acao=deleteDenunciaComent&cod_denuncia=<?= $denuncia['cod_den_coment'] ?>">Excluir</a></td>

                            </tr>
                            <?php endforeach; ?>


                        </table>

                    </div>
                </div>
                </div>
            </div>
        </div>
        </body>
        </html>
    <?php }else{
        header('Location: index.php?erro=den');
    } ?>