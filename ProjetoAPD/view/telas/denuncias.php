<?php include "base/cabecalho_generico.php";

    require_once("../../model/CrudUsuario.php");
    require_once("../../model/CrudDenuncias.php");

    if (isset($_SESSION['logado']) AND $user->getCodTipoUsuario() == 1){ ?>
                
            </div>
                <div class="ui center aligned container" style="margin-top: 3em">


                <script>
                    $(document).ready(function(){

                        $("#den_forum").hide();
                        $("#den_chat").hide();
                        $("#den_coment").hide();

                        $("#butDenForum").click(function(){
                            $("#den_forum").show();
                            $("#den_chat").hide();
                            $("#den_coment").hide();
                        });

                        $("#butDenChat").click(function(){
                            $("#den_forum").hide();
                            $("#den_chat").show();
                            $("#den_coment").hide();
                        });

                        $("#butDenComentario").click(function(){
                            $("#den_forum").hide();
                            $("#den_chat").hide();
                            $("#den_coment").show();
                        });

                    });

                </script>

                <div class="ui buttons">
                    <button class="ui button" id="butDenForum">Denúncias fórum</button>
                    <button class="ui button" id="butDenChat">Denúncias chat</button>
                    <button class="ui button" id="butDenComentario">Denúncias comentários</button>
                </div>


                <!--FORUM----------------------------------------------------------------------------------------------------------------->
                <div id="den_forum">
                    
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
                                <td><?= $b->getUsuarioDenunciaForum($denuncia->getCodDenForum()) ?></td>

                                <td><button class="ui button" id="botaoModalTextoDenunciaPostagem<?= $denuncia->getCodDenForum() ?>">Ver postagem</button></td>
                                <div class="ui fullscreen modal transition" id="modalTextoDenunciaPostagem<?= $denuncia->getCodDenForum() ?>">
                                    <p style="padding: 3em;"><?= $b->getPostagemDenForum($denuncia->getCodPostagem()) ?></p>
                                </div>
                                <script>
                                    $(document).ready(function(){
                                        $("#botaoModalTextoDenunciaPostagem<?= $denuncia->getCodDenForum() ?>").click(function () {
                                            $("#modalTextoDenunciaPostagem<?= $denuncia->getCodDenForum() ?>").modal('show')
                                        })
                                    })
                                </script>

                                <td><?= $denuncia->getTextDenF() ?></td>
                                <td><?= $denuncia->getDataHora() ?></td>

                                <td class="right aligned"><a href="../../controller/acoesUsu.php?acao=deleteUsuDenuncia&cod_usuario=<?= $denuncia->getCodUsuario() ?>">Banir usuário</a> |
                                    <a href="../../controller/acoesDen.php?acao=deleteDenunciaPostagem&cod_denuncia=<?= $denuncia->getCodDenForum() ?>">Excluir</a></td>
                            </tr>
                            <?php endforeach; ?>

                        </table>

                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------------------------------>



                <!--CHAT----------------------------------------------------------------------------------------------------------------->
                <div id="den_chat">
                    
                    <div class="ui comments">

                        <br>
                        <table class="ui selectable unstackable table">
                            <thead>
                            <tr>
                                <th>Nome do usuário</th>
                                <th>Mensagem denunciada</th>
                                <th>Data Denúncia</th>
                                <th class="right aligned">#</th>
                            </tr>
                            </thead>

                            <tr>
                                <?php

                                $b = new CrudDenuncias();
                                $denuncias = $b->getDenunciasChat();

                                foreach($denuncias as $denuncia): ?>
                                <td><?= $b->getUsuarioDenunciaChat($denuncia->getCodDenChat()) ?></td>
                                <td><?= $b->getMensagemDenChat($denuncia->getConversaCodMensagem()) ?></td>
                                <td><?= $denuncia->getDtDenChat() ?></td>

                                <td class="right aligned"><a href="../../controller/acoesUsu.php?acao=deleteUsuDenuncia&cod_usuario=<?= $denuncia->getCodUsuario() ?>">Banir usuário</a> |
                                    <a href="../../controller/acoesDen.php?acao=deleteDenunciaChat&cod_denuncia=<?= $denuncia->getCodDenChat() ?>">Excluir</a></td>

                            </tr>
                            <?php endforeach; ?>


                        </table>

                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------------------------------>




                <!--COMENTARIO----------------------------------------------------------------------------------------------------------------->
                <div id="den_coment">
                    
                    <div class="ui comments">

                        <br>
                        <table class="ui selectable unstackable table">
                            <thead>
                            <tr>
                                <th>Nome do usuário</th>
<!--                                <th>Postagem</th>-->
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
                                <td><?= $b->getUsuarioDenunciaComentario($denuncia->getCodDenComent()) ?></td>
<!--                                <td><//= $b->getPostagemDenForumFromComent($denuncia->getCodComentario()) ?></td>-->

                                <td><button class="ui button" id="botaoModalTextoDenunciaComentario<?= $denuncia->getCodDenComent() ?>">Ver comentário</button></td>
                                <div class="ui fullscreen modal transition" id="modalTextoDenunciaComentario<?= $denuncia->getCodDenComent() ?>">
                                    <div style="padding: 3em">
                                        <h4>Postagem</h4>
                                        <p><?= $b->getPostagemDenForumFromComent($denuncia->getCodComentario()) ?></p>
                                        <h4>Comentario</h4>
                                        <p><?= $b->getComentarioDenComent($denuncia->getCodComentario()) ?></p>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function(){
                                        $("#botaoModalTextoDenunciaComentario<?= $denuncia->getCodDenComent() ?>").click(function () {
                                            $("#modalTextoDenunciaComentario<?= $denuncia->getCodDenComent() ?>").modal('show')
                                        })
                                    })
                                </script>

                                <td><?= $denuncia->getTextDenC() ?></td>
                                <td><?= $denuncia->getDataHora() ?></td>

                                <td class="right aligned"><a href="../../controller/acoesUsu.php?acao=deleteUsuDenuncia&cod_usuario=<?= $denuncia->getCodUsuario() ?>">Banir usuário</a> |
                                    <a href="../../controller/acoesDen.php?acao=deleteDenunciaComent&cod_denuncia=<?= $denuncia->getCodDenComent() ?>">Excluir</a></td>

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