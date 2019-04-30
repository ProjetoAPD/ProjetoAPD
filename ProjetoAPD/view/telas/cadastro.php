<?php include "base/cabecalho_login.php" ?>
  <body>

  <div class="ui middle aligned center aligned grid">
    <div class="column">
      <h2 class="ui teal image header">
        <img src="assets/images/nome.png" class="image">
        <div class="content">
          Cadastre-se
        </div>
      </h2>
      <form method="post" class="ui large form" action="../../controller/acoesUsu.php?acao=cadastrar" autocomplete="off">
        <!-- usuario -->
        <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="user outline icon"></i>
              <input type="text" name="usuario" placeholder="Nome de usuário" >
            </div>
          </div>
          <!-- email -->
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="email" name="email" placeholder="E-mail">
            </div>
          </div>
          <!-- senha -->
          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="senha" placeholder="Digite sua senha">
            </div>
          </div>
            <!-- tipo usuario -->
            <div class="field">
                <div class="ui left icon input">
                    Tipo de usuário:
                    <input type="radio" name="tipo_usuario" value="3" id="comum" title="comum"> Comum
                    <input type="radio" name="tipo_usuario" value="2" id="psicologo" title="psicologo"> Psicólogo
                </div>
            </div>
            <h4>Caso seja um psicólogo, preencha seus dados</h4>
            <!--nome registro-->
            <div class="field" id="cpf">
                <div class="ui left icon input">
                    <i class="address card icon"></i>
                    <input type="text" name="nome_registro" id="nome_registro" placeholder="Nome do registro">
                </div>
            </div>
            <!-- crp -->
            <div class="field" id="cfp">
                <div class="ui left icon input">
                    <i class="address card icon"></i>
                    <input type="number" min="10000" max="99999" name="cfp" id="cfp" placeholder="CFP">
                </div>
            </div>
            <!--cpf-->
            <div class="field" id="cpf">
                <div class="ui left icon input">
                    <i class="address card icon"></i>
                    <input type="number" name="cpf" id="cpf" placeholder="CPF">
                </div>
            </div>
            <button class="ui fluid large teal submit button" type="submit">Cadastrar</button>

            <?php
            if (isset($_GET['erro'])){
            if ($_GET['erro'] == 2){
                echo "<h4 style='color: red;'>Falha ao validar o registro de psicólogo, por favor tente novamente</h4>";
            }
            if ($_GET['erro'] == 3){
                echo "<h4 style='color: red;'>Falha ao cadastrar, por favor insira todos os campos e tente novamente</h4>";
            }
            }?>
        </div>



          <div class="ui error message"></div>

      </form>

      <div class="ui message">
        Já tem conta? <a href="login.php">Logue</a>
      </div>
      <hr>
      <div class="ui message"><a href="index.php">voltar a pagina inicial</a> </div>
    </div>
  </div>

  </body>

  </html>
