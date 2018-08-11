  <!DOCTYPE html>
  <html>
  <head>
    <link rel="icon" href="assets/images/nome.png">
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Cadastro</title>


      <link rel="stylesheet" type="text/css" href="assets/style.css">
      <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
      <script
              src="https://code.jquery.com/jquery-3.1.1.min.js"
              integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
              crossorigin="anonymous"></script>
      <script src="../semantic/dist/semantic.min.js"></script>




      <style type="text/css">
      body {
        background-color: #4C2C63;
      }
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
        color: #ffffff;
      }
  }

    </style>

  </head>
  <body>

  <div class="ui middle aligned center aligned grid">
    <div class="column">
      <h2 class="ui teal image header">
        <img src="assets/images/nome.png" class="image">
        <div class="content">
          Cadastre-se
        </div>
      </h2>
      <form method="post" class="ui large form" action="../../controller/acoesUsu.php?acao=cadastrar">
        <!-- usuario -->
        <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="user outline icon"></i>
              <input type="text" name="usuario" placeholder="Nome de usuário">
            </div>
          </div>
          <!-- email -->
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="email" placeholder="E-mail">
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
