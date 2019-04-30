<?php include "base/cabecalho_generico.php" ?>
<body>

  <script>
    <?php if (isset($_GET['erro']) AND $_GET['erro'] == 'senha'): ?>
      alert("As senhas não batem, tente novamente");
    <?php endif ?>
  </script>

        </div>


            <!-- corpo do formulario -->
            <div class="ui middle aligned center aligned grid" id="corpo_formulario">
                <div class="column" style="width: 30em">
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
                                          <input type="password" name="conf_senha">
                                        </div>
                                    </div>

                                    <br>
                                    <div class="ui center aligned two column grid" id="botoes">
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
